
 <?php

 $conn =  mysqli_connect('localhost','root','','gms');

 $sql = "SELECT * FROM export_order WHERE buyer_id =$current_customer order by order_id desc";
 $result = mysqli_query($conn, $sql);
 $total = $result->num_rows;


 $sql = "SELECT  invoice.invoice_id, invoice.order_id, invoice.invoice_date, export_order.order_id, export_order.order_date, export_order.p_name, export_order.xsmall, export_order.small, export_order.medium, export_order.large, export_order.xlarge, export_order.2xlarge, export_order.3xlarge, export_order.quantity, export_order.rate, export_order.total, export_order.advance, export_order.remain, export_order.delivery_date,garment_buyer_company.com_name, garment_buyer_company.com_agent, garment_buyer_company.country, garment_buyer_company.buyer_id, garment_buyer_company.phone, garment_buyer_company.state, garment_buyer_company.address, garment_buyer_company.email FROM invoice INNER JOIN export_order on invoice.order_id = export_order.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id WHERE garment_buyer_company.buyer_id =$current_customer order by invoice.invoice_id desc";

 $result1 = mysqli_query($conn, $sql);
 $total_1 = $result1->num_rows;


 $sql = "SELECT garment_export_information.exinfo_id, garment_export_information.order_id, garment_export_information.delivery_date, garment_export_information.shipping_cost, garment_export_information.tax, garment_export_information.receive_date,invoice.invoice_id, invoice.order_id, invoice.invoice_date, export_order.order_id, export_order.p_name, export_order.xsmall, export_order.small, export_order.medium, export_order.large, export_order.xlarge, export_order.2xlarge, export_order.3xlarge, export_order.quantity, export_order.rate, export_order.total, export_order.advance, export_order.remain, export_order.order_date,garment_buyer_company.com_name, garment_buyer_company.com_agent, garment_buyer_company.country, garment_buyer_company.buyer_id, garment_buyer_company.phone, garment_buyer_company.state, garment_buyer_company.address, garment_buyer_company.email FROM garment_export_information INNER JOIN invoice on garment_export_information.order_id = invoice.order_id INNER JOIN export_order on invoice.order_id = export_order.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id WHERE garment_buyer_company.buyer_id =$current_customer order by garment_export_information.exinfo_id desc";

 $result2 = mysqli_query($conn, $sql);
 $total_2 = $result2->num_rows;


 $sql = "SELECT transaction_of_export.buyer_transaction_id, transaction_of_export.order_id, transaction_of_export.transaction_date, transaction_of_export.transaction_type, transaction_of_export.transaction_amount, transaction_of_export.comment, export_order.buyer_id, export_order.p_name, garment_buyer_company.com_name, garment_buyer_company.buyer_id ,export_order.total FROM transaction_of_export INNER JOIN export_order on export_order.order_id = transaction_of_export.order_id INNER JOIN garment_buyer_company on export_order.buyer_id = garment_buyer_company.buyer_id WHERE garment_buyer_company.buyer_id =$current_customer order by transaction_of_export.buyer_transaction_id desc";


 $result3 = mysqli_query($conn, $sql);
 $total_3 = $result3->num_rows;


 ?>

<!--***********************************************  Options Start  *********************************************** -->


<!--*****************************************************  0  ***************************************************** -->

                <div class="col-lg-3 col-md-6">
                    <div class="well well-sm">

                        <div class="panel-heading" style="background-color:white  ; color:#2874a6">
                            <div class="row">
                                <div class="col-xs-3">
                                    <h1 class="glyphicon glyphicon-shopping-cart"></h1>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><div class="huge"><?php echo $total; ?></div></h3>
                                    <div>Orders</div>
                                </div>
                            </div>
                        </div>

                        <a href="buyer_order_details.php">
                            <div class="panel-footer" style="background-color:#f0f3f4 ; color:">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>



<!--*****************************************************  1  ***************************************************** -->

                <div class="col-lg-3 col-md-6">
                    <div class="well well-sm">

                        <div class="panel-heading" style="background-color:white; color:#27ae60">
                            <div class="row">
                                <div class="col-xs-3">
                                    <h1 class="glyphicon glyphicon-usd"></h1>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><div class="huge"><?php echo $total_1; ?></div></h3>
                                    <div>Invoices</div>
                                </div>
                            </div>
                        </div>

                        <a href="buyer_invoice_details.php">
                            <div class="panel-footer" style="background-color:#f0f3f4; color:">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


<!--*****************************************************  2  ***************************************************** -->

                <div class="col-lg-3 col-md-6">
                    <div class="well well-sm">

                        <div class="panel-heading" style="background-color:white; color:#DC7633">
                            <div class="row">
                                <div class="col-xs-3">
                                    <h1 class="glyphicon glyphicon-credit-card"></h1>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><div class="huge"><?php echo $total_2; ?></div></h3>
                                    <div>Products Import Info</div>
                                </div>
                            </div>
                        </div>

                        <a href="buyer_export_infomation_details.php">
                            <div class="panel-footer" style="background-color:#f0f3f4; color:">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>



<!--*****************************************************  3  ***************************************************** -->

                <div class="col-lg-3 col-md-6">
                    <div class="well well-sm">

                        <div class="panel-heading" style="background-color:white; color:#85929E">
                            <div class="row">
                                <div class="col-xs-3">
                                    <h1 class="glyphicon glyphicon-export"></h1>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3><div class="huge"><?php echo $total_3; ?></div></h3>
                                    <div>Payment Transactions</div>
                                </div>
                            </div>
                        </div>

                        <a href="buyer_transaction_of_export_details.php">
                            <div class="panel-footer" style="background-color:#f0f3f4 ; color:">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


<!--*****************************************************  4  ***************************************************** -->



<!--*************************************************  Options End  ************************************************* -->
