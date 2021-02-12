<?php
$arg = [
    'column-width'=>'12'
];

if (! empty($atts)) {
    $arg = wp_parse_args($atts, $arg);
}
?>

<?php ob_start(); ?>

<div class="row">
    <div class="col-md-<?php echo $arg['column-width'];?>">
        <form id="calculator" name="calc" class="bordered">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="form-group">
                        <input class="form-control" type="text" name="cost" id="cost" placeholder="Материален интерес в лева"/>
                    </div>
                </div>

                <div class="col-sm-12 col-md-5">
                    <div class="form-group">
                        <select class="form-control" name="city" id="city">
                            <!--                        <option value="">изберете град</option>-->
                            <option value="2.5">Стара Загора</option>
                            <option value="2.5">София</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-10">
                    <p id="error"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Резултат</th>
                            <th> в лева</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="">Данъчна служба (местен данък)</td>
                            <td id="local-tax">0</td>
                        </tr>
                        <tr>
                            <td class="">Агенция вписвания (вписване)</td>
                            <td id="agency">0</td>
                        </tr>
                        <tr>
                            <td class="">Нотариална такса</td>
                            <td id="notary-fee">0</td>
                        </tr>
                        <tr>
                            <td class="">ДДС</td>
                            <td id="vat">0</td>
                        </tr>
                        <tr class="">
                            <td><strong>ОБЩО</strong></td>
                            <td id="total" style="font-weight: bold">0</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </form>

    </div>
</div>

<?php return ob_get_clean();?>

