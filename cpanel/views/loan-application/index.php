<?php
use yii\helpers\Html;
use common\models\LoanApplicationsManager;
//Highcharts
use miloschuman\highcharts\Highcharts;
use nullref\datatable\DataTable;

$this->title = 'Loan Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-application-index">
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
<script>
 jQuery(document).ready(function() {
    jQuery('#all_applications').DataTable();
} );
</script>
    <div class="row tile_count">
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count">2500</div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
        </div>
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
                <div class="count">123.50</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
        </div>
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                <div class="count green">2,500</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                <div class="count">4,567</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
        </div>
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                <div class="count">2,315</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
                <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                <div class="count">7,325</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>

    </div>
    <div class='row'>
        <div class='col-lg-12 well' style='border-radius: 0px;background:#fff'>       
            <h2><?= Html::encode($this->title) ?>
            </h2>

            <table class="table table-striped dataTable" id="all_applications">
                <thead>
                    <tr>
                        <th>
                            REFERENCE NO
                        </th>
                        <th>
                            APPLICATION DATE
                        </th>
                        <th>
                            APPLICANT
                        </th>
                        <th>LOAN TYPE</th>
                        <th>AMOUNT APPROVED</th>
                        <TH>REPAYMENT PERIOD</TH>
                        <TH>STATUS</TH>
                        <TH></TH>
                    </tr>   
                </thead>
                <tbody>
                    <?php
                    foreach ($applications AS $application) {
                        $loan = (object) $application;
                        ?>
                        <tr>
                            <td>
                                <b><a href="index.php?r=casefile/summary&id=<?= $loan->loan_application_id; ?>">
    <?= $loan->reference_no; ?>
                                    </a></b>
                                <br/>
                            </td>
                            <td>
    <?= $loan->created_date ?>
                            </td>
                            <td>
    <?= $loan->sacco_account_no ?>
                            </td>
                            <th>
    <?= $loan->loan_type_id ?>
                            </th>
                            <td>
    <?= $loan->amount_approved ?>
                            </td>
                            <td><b><?= $loan->repayment_period ?></b> Months</td>
                            <td>
                                <span class='label label-danger'><?= $loan->status_code ?></span>
                            </td>
                            <td>
                                <a href='#' class='btn btn-primary'>
                                    <span class='fa fa-file-text'></span>
                                    Details</a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class='col-lg-6' style='border-radius: 0px'>
            <h2>Applications by Loan Type</h2>
            <?php
            echo Highcharts::widget([
                'options' => [
                    'chart' => ['type' => 'pie'],
                    'title' => ['text' => 'Loan applications by Type'],
                    'xAxis' => [
                        'categories' => ['Mon', 'Tues', 'Wed', 'Thur', 'Fri'],
                        'title' => "Loan applications in the last one week"
                    ],
                    'yAxis' => [ 'title' => ['text' => 'Total Amount applied for (Millions)']],
                    'series' => [
                        [
                            'name' => 'Loan Applications',
                            'data' => [52, 55, 77, 65, 89]
                        ],
                    ]
                ]
            ]);
            ?>

        </div>
        <div class="col-lg-6">
            <h2>Applications this Week</h2>
            <?php
            echo Highcharts::widget([
                'options' => [
                    'chart' => ['type' => 'column'],
                    'title' => ['text' => 'Loan applications this week'],
                    'xAxis' => [
                        'categories' => ['Mon', 'Tues', 'Wed', 'Thur', 'Fri'],
                        'title' => "Loan applications in the last one week"
                    ],
                    'yAxis' => [ 'title' => ['text' => 'Total Amount applied for (Millions)']],
                    'series' => [
                        [
                            'name' => 'Loan Applications',
                            'data' => [52, 55, 77, 65, 89]
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>

