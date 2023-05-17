<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use app\models\ItemsList;
use app\models\ItemsListSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * ItemsListController implements the CRUD actions for ItemsList model.
 */
class ItemsListController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ItemsList models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ItemsListSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new ItemsList();
        if ($this->request->isPost) {
            $photoFile = new UploadForm();
            if ($model->load(Yii::$app->getRequest()->post())) {

                $path = Yii::$app->basePath . '/web/items_photo/';
                $photoFile->file = UploadedFile::getInstance($model, 'photo');

                if ($photoFile->file && $photoFile->validate()) {
                    $md5 = md5(date('d-m-y H:i:s'));
                    $model->photo = $md5 . '_photo' . '.' . $photoFile->file->extension;
                    $photoFile->file->saveAs($path. $model->photo);
                }

                if ($model->save())
                    return $this->redirect(Yii::$app->request->referrer);
                else
                    var_dump($model->errors);
                die();

            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single ItemsList model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReport(){
        $categoryes = Categories::find()->where(['active'=>0])->all();
//        var_dump($categoryes->getCountItem());die();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Инвентаризация '.date('Y'));

        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Категория');
        $sheet->setCellValue('C1', 'Количество');
        for ($i = 0; count($categoryes) > $i; $i++){
            $itemsCount = ItemsList::find()->where(['category_id'=>$categoryes[$i]->id])->count();
            $sheet->setCellValue('A'.($i+2), $i+1);
            $sheet->setCellValue('B'.($i+2), $categoryes[$i]->name);
            $sheet->setCellValue('C'.($i+2), $itemsCount);
        }

        // Writer можно создать так:
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        //$writer = new Xlsx($spreadsheet);

        $writer->save('report.xlsx');

        $spreadsheet->disconnectWorksheets();
        return $this->redirect('/report.xlsx');
    }

    /**
     * Creates a new ItemsList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ItemsList();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ItemsList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ItemsList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItemsList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ItemsList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemsList::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
