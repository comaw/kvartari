<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 12:50
 */


?>
<div class="container">
    <div class="row">
        <div class="span3"  style="margin-top:-335px">
            <div class="property-filter pull-right">
                <div class="content">
                    <form method="get" action="?">
                        <div class="location control-group" style="margin-bottom:18px">
                            <div class="controls">
                                <select id="inputLocation">
                                    <option id="malibu">Россия, Санкт-Петербург</option>
                                </select>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <div class="type control-group">
                            <div class="controls">
                                <select id="inputType">
                                    <option id="apartment">Квартира</option>
                                    <option id="condo">Дом</option>
                                </select>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <div class="beds control-group">
                            <label class="control-label" for="inputBeds"> Кровати </label>
                            <div class="controls">
                                <select id="inputBeds">
                                    <option id="11">1</option>
                                    <option id="21">2</option>
                                </select>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <div class="baths control-group">
                            <label class="control-label" for="inputBaths"> Ванные </label>
                            <div class="controls">
                                <select id="inputBaths">
                                    <option id="1">1</option>
                                    <option id="2">2</option>
                                </select>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <div class="rent control-group">
                            <div class="controls">
                                <label class="checkbox" for="inputRent">
                                    <input type="checkbox" id="inputRent">
                                    Интернет </label>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <div class="sale control-group">
                            <div class="controls">
                                <label class="checkbox" for="inputSale">
                                    <input type="checkbox" id="inputSale">
                                    Кухня </label>
                            </div><!-- /.controls -->
                        </div><!-- /.control-group -->

                        <!--<div class="price-from control-group">
                            <label class="control-label" for="inputPriceFrom"> Цена от </label>
                            <div class="controls">
                                <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                            </div>
                        </div>

                        <div class="price-to control-group">
                            <label class="control-label" for="inputPriceTo"> Цена до </label>
                            <div class="controls">
                                <input type="text" id="inputPriceTo" name="inputPriceTo">
                            </div>
                        </div>

                        <div class="price-value">
                            <span class="from"></span>
                            -
                            <span class="to"></span>
                        </div>

                        <div class="price-slider"></div> -->

                        <div class="form-actions">
                            <a href="/realty/filterList/all"  class="btn btn-primary btn-large" style="width:195px"> Найти! </a>
                        </div><!-- /.form-actions -->
                    </form>
                </div><!-- /.content -->
            </div><!-- /.property-filter -->
        </div><!-- /.span3 -->
    </div><!-- /.row -->
</div><!-- /.container -->
