<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\ComponentBase;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\categorys\models\Type_albumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music';
$this->params['breadcrumbs'][] = $this->title;
$arr = array('0' => '10', '1' => '15', '2' => '20', '3' => '30',
    '4' => '50');
$components = new ComponentBase();
$base_url = $components->Base_url();
$url_audio = $components->Base_url_images();
?>
<div class="type-album-index">
    <div>
        <section class="content-header">
            <h1 class="add-color-content-header">
                Danh mục bài hát
            </h1>
        </section>
    </div>
    <div class="search-in-category">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="pull-right">
        <?= Html::a(' + Thêm', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "<div class='summary'>Hiển thị <b>{begin}</b> - <b>{end}</b> trên <b>{totalCount}</b> bản ghi<div>",
        'emptyText' => 'Không có bản ghi !',
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => '',
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:3%;',],
            ],
            [
                'attribute' => 'title',
                'label' =>'Tiêu đề',
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:15%;',],
            ],
            [
                'attribute' => 'description',
                'label' => 'Mô tả',
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:15%;',],
            ],
            [
                'attribute' => 'url',
                'label' =>'Nghe',
                'format' => 'raw',
                'value' => function ($row) {
                    $components = new ComponentBase();
                    $url_audio = $components->Base_url_images();
                    return '<audio controls>
                                <source src="'.$url_audio.$row['url'].'" type="audio/ogg">
                            </audio>';
                },
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:15%;',],
            ],
            [
                'attribute' => 'authors',
                'label' =>'Tác giả',
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:15%;',],
            ],
            [
                'attribute' => 'cate_id',
                'label' =>'Danh mục',
                'value' => 'cate.title',
                'headerOptions' => ['class' => 'text-center text-headerOptions'],
                'contentOptions' => ['class' => 'word-wrap-new', 'style' => 'width:15%;',],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'header' => '',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'word-wrap-new text-center', 'style' => 'width:7%;',],
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url, ['title' => 'Cập nhật']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '',
                            $url = '#',
                            ['class' => 'glyphicon glyphicon-trash confirm_delete_district add-color-content-header', 'id' => $model->id,'title' => 'Xóa']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>



<div class="modal fade" id="confirm_delete_district_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal_header-site">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="h4_fontsize-modal"><span class="glyphicon glyphicon-lock"></span> Bạn có
                    chắc chắn muốn xóa bản ghi ?</h4>
            </div>
            <div class="id_delete_district_inmodal_div hide"></div>
            <div class="modal-footer modal_footer-site">
                <button type='submit' class='btn btn-primary btn-default pull-left confirm_delete_district_btn margin_modal-3'><span class='glyphicon glyphicon-trash'></span> Xóa </button>
                <button type="submit" class="btn btn-danger btn-default pull-left margin_modal-5" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Đóng</button>
                

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-success_delete" role="dialog">
    <div class="modal-dialog">
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-success" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="text-success-modal text-center"></h3>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".confirm_delete_district").click(function(){
            var id = $(this).attr('id');
            $('.confirm_delete_district_btn').attr('id',id);
            $("#confirm_delete_district_modal").modal();
            });
        $(".confirm_delete_district_btn").click(function(){
            $("#confirm_delete_district_modal").modal("hide");
                var id_delete = $(this).attr('id');
                if (id_delete) 
                {
                    $.ajax({
                        method: 'POST',
                        url: '<?php echo $base_url ?>contents/music/delete',
                        data: { 'value' : id_delete},
                        async: true,
                        success: function(result){
                            if (result == 'success') 
                            {
                                $("#modal-success_delete").modal("show");
                                $('.text-success-modal').html('<span class="glyphicon glyphicon-ok-circle"></span> Xóa thành công');
                                window.setTimeout(function () {
                                $("#modal-success_delete").modal("hide");
                                    location.replace('<?php echo $base_url ?>contents/music');
                                }, 2000);
                        
                            }
                            else
                            {
                                $("#modal-success_delete").modal("show");
                                $('.text-success-modal').html('<span class="glyphicon glyphicon-remove-circle"></span> Xóa không thành công');
                                window.setTimeout(function () {
                                $("#modal-success_delete").modal("hide");
                                }, 2000);
                        

                            }
                        }

                    });
                }
                else
                {
                    return false;
                }
       
        });
    });    
</script>

