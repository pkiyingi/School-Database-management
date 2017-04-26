<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<?=
                    DetailView::widget([
                        'model' => $loandetails,
                        'attributes' => [
                            'reference_no',
                            'sacco_account_no',
                            'loan_type_id',
                            'created_date',
                            'created_by',
                            'amount_requested',
                            'loan_purpose',
                            'consolidated_pay',
                            'other_income',
                            'monthly_expenditure',
                            'new_sacco_savings',
                            'other_loan_repayments',
                            'bank_account_id',
                            'update_date',
                            'updated_by',
                            'submitted_date',
                            'status_code',
                            'amount_approved',
                            'repayment_period',
                            'monthly_repayment',
                            //'disbursment_date',
                            //'outstanding_loan_balance',
                            //'bank_loan_payment',
                            //'net_payment',
                        ],
                    ])
                    ?>