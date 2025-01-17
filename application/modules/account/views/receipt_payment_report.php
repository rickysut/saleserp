<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('receipt_payment') ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo  form_open_multipart('receipt_payment_report') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpFromDate"
                                    value="<?php echo date('Y-m-d',strtotime('first day of this month'));?>"
                                    placeholder="<?php echo display('from_date') ?>" class="datepicker form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?></label>
                            <div class="col-sm-8">
                                <input type="text" name="dtpToDate"
                                    value="<?php echo date('Y-m-d',strtotime('last day of this month'));?>"
                                    placeholder="<?php echo display('to_date') ?>" class="datepicker form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reportType" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="radio" id="reportType1" name="reportType"
                                    <?php echo  $reportType == 'Accrual Basis'? 'checked':'';?> size="60"
                                    class="form-contro radio-inline" value="Accrual Basis" />&nbsp;&nbsp;&nbsp;<label
                                    for="reportType"><?php echo display('accrual_basis') ?></label> &nbsp;&nbsp'&nbsp;
                                <input type="radio" id="reportType2" name="reportType" size="60" class="radio-inline"
                                    <?php echo  $reportType == 'Cash Basis'? 'checked':'';?>
                                    value="Cash Basis" />&nbsp;&nbsp;&nbsp;<label
                                    for="reportType"><?php echo display('cash_basis') ?></label>
                            </div>
                        </div>
                        <div class="form-group form-group-margin text-right">
                            <button type="submit"
                                class="btn btn-success w-md m-b-5"><?php echo display('find') ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div id="printableArea">
                    <div class="panel-body" id="printableArea">
                        <div class="table-responsive">
                            <table width="100%" >
                                <caption class="text-center">
                                    <table class="print-font-size" width="100%">
                                        <tr>
                                            <td align="left" style="border-bottom: 2px #333 solid;" width="33.333%">
                                                <img src="<?php echo base_url().$setting->logo;?>"
                                                    class="img-bottom-m print-logo" alt="logo">
                                            </td>
                                            <td align="center" style="border-bottom: 2px #333 solid;" width="33.333%">
                                                <strong
                                                    class=""><?php echo html_escape($company_info[0]['company_name'])?></strong><br>
                                                
                                                <?php echo html_escape($company_info[0]['address']);?>
                                                <br>
                                                <?php echo html_escape($company_info[0]['email']);?>
                                                <br>
                                                <?php echo html_escape($company_info[0]['mobile']);?>
                                            </td>
                                            <td align=" right" style="border-bottom: 2px #333 solid;" width="33.333%">
                                                <date> <?php echo display('date')?>: <?php echo date('d-M-Y'); ?> </date>
                                                <br>
    
                                            </td>
                                        </tr>
                                    </table>
                                </caption>
                                <caption class="text-center" style="border-bottom: 1px #c9c9c9 solid;">
                                <strong>
                                        <?php echo display('receipt_payment')?> <?php echo display('from_date')?>
                                        <?php echo date('d-m-Y', strtotime($dtpFromDate)) ;?>
                                        <?php echo display('to_date')?>
                                        <?php echo date('d-m-Y', strtotime($dtpToDate)) ;?>
                                    </strong>
                                </caption>
                                
                            </table>
                            <table width="99%" align="left" class="datatableReport table table-striped table-bordered table-hover general_ledger_report_tble">
                                
                                <thead class="table-bordered">
                                    <tr>
                                        <th width="60%" bgcolor="#E7E0EE" align="left">
                                            <?php echo display('particulars')?></th>
                                        <th class="profitamount" width="40%" bgcolor="#E7E0EE" align="left" >
                                            <?php echo display('balance')?></th>
                                    </tr>


                                </thead>
                                <tbody class="table-bordered">
                                    <tr>
                                        <td height="70" align="left" colspan="2">
                                            <strong><?php echo display('opening_balance')?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;">
                                            <?php echo  display('cashinhand');?></td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($cashOpening,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;">
                                            <?php echo  display('cash_bank');?></td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($bankOpening,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;"><?php echo  display('advance');?>
                                        </td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($advOpening,2); ?></td>
                                    </tr>



                                    <tr>
                                        <td height="70" align="left" colspan="2">
                                            <strong><?php echo display('receipt')?></strong>
                                        </td>
                                    </tr>
                                    <?php if(count($receiptitems) > 0) { $gtotal=0;
                           foreach($receiptitems as $receiptitem) { ?>
                                    <tr>
                                        <td align="left" style="padding-left: 80px;">
                                            <?php echo $receiptitem['headName'];?></td>
                                        <td align="right"></td>
                                    </tr>

                                    <?php if(count($receiptitem['innerHead']) > 0) { foreach($receiptitem['innerHead'] as $inner) { ?>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;"><?php echo $inner['headName'];?>
                                        </td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($inner['credit'],2); ?></td>
                                    </tr>
                                    <?php } } $gtotal += $inner['credit'];?>

                                    <?php } ?>
                                    <tr bgcolor="#E7E0EE">
                                        <td align="right"><strong><?php echo display('total');?></strong></td>
                                        <td align="right" class="profitamount">
                                            <strong><?php echo $currency. ' '. number_format($gtotal ,2); ?></strong>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr bgcolor="#E7E0EE">
                                        <td align="right"><strong><?php echo display('gtotal');?></strong></td>
                                        <td align="right" class="profitamount">
                                            <strong><?php echo $currency. ' '. number_format(($gtotal+ $cashOpening+$bankOpening + $advOpening) ,2); ?></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td height="70" align="left" colspan="2">
                                            <strong><?php echo display('payments')?></strong>
                                        </td>
                                    </tr>
                                    <?php if(count($paymentitems) > 0) { $pgtotal=0;
                           foreach($paymentitems as $paymentitem) { ?>
                                    <tr>
                                        <td align="left" style="padding-left: 80px;">
                                            <?php echo $paymentitem['headName'];?></td>
                                        <td align="right"></td>
                                    </tr>

                                    <?php if(count($paymentitem['innerHead']) > 0) { foreach($paymentitem['innerHead'] as $inner) { ?>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;"><?php echo $inner['headName'];?>
                                        </td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($inner['debit'],2); ?></td>
                                    </tr>
                                    <?php } } $pgtotal += $inner['debit'];?>

                                    <?php } ?>
                                    <tr bgcolor="#E7E0EE">
                                        <td align="right"><strong><?php echo display('total');?></strong></td>
                                        <td align="right" class="profitamount">
                                            <strong><?php echo $currency. ' '. number_format($pgtotal ,2); ?></strong>
                                        </td>
                                    </tr>
                                    <?php } ?>



                                    <tr>
                                        <td height="70" align="left" colspan="2">
                                            <strong><?php echo display('closing_balance')?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;">
                                            <?php echo display('cashinhand');?></td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($cashClosing,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;"><?php echo display('cash_bank');?>
                                        </td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($bankClosing,2); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="left" style="padding-left: 160px;"><?php echo display('advance');?>
                                        </td>
                                        <td align="right" class="profitamount">
                                            <?php echo $currency. ' '. number_format($advClosing,2); ?></td>
                                    </tr>
                                    <tr bgcolor="#E7E0EE">
                                        <td align="right"><strong><?php echo display('gtotal');?></strong></td>
                                        <td align="right" class="profitamount">
                                            <strong><?php echo $currency. ' '. number_format(($pgtotal+ $advClosing+$bankClosing + $cashClosing) ,2); ?></strong>
                                        </td>
                                    </tr>

                                </tbody>
                                <table border="0" width="100%">
                                    <tr>
                                        <td align="left" class="noborder">
                                            <div class="border-top"><?php echo display('prepared_by')?></div>
                                        </td>
                                        <td align="center" class="noborder">
                                            <div class="border-top"><?php echo display('checked_by')?></div>
                                        </td>
                                        <td align="right" class="noborder">
                                            <div class="border-top"><?php echo display('authorised_by')?></div>
                                        </td>
                                    </tr>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center" id="print">
                    <button class="btn btn-warning btn-md" name="btnPrint" id="btnPrint"
                        onclick="printDivnew('printableArea');"><i class="fa fa-print"></i> Print </button>

                    <a href="<?php echo base_url('account/accounts/receipt_payment_report_excel/'.$dtpFromDate.'/'.$dtpToDate.'/'.$reportType)?>"
                        target="_blank" title="download pdf">
                        <button class="btn btn-primary btn-md" name="btnexcel" id="btnexcel"><i
                                class="fa fa-file-excel-o"></i>
                            Excel</button>
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>