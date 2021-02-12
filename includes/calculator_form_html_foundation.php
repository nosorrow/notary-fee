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
    <div class="large-<?php echo $arg['column-width'];?> medium-<?php echo $arg['column-width'];?> columns">

        <div class="property-search-box-wrap" style="margin-bottom: 20px">
            <div class="row">
                <div class="columns large-10">

                    <form method="post" id="calculator" class="property-search-form">

                        <div class="row">
                            <div class="columns large-6 medium-6 search-id">
                                <label>Въведете сума<span style="color:red">*</span>
                                    <input type="text" name="cost" id="cost" placeholder="Материален интерес в лева">
                                </label>
                            </div>

                            <div class="columns large-6 medium-6 search-location">
                                <label>Изберете град</span>
                                    <select class="form-control" name="city" id="city">
                                        <option value="2.5">Стара Загора</option>
                                        <option value="2.5">София</option>
                                    </select>
                                </label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="columns large-12 medium-12">
                                <p id="error"></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div><!-- End form -->

        <div class="row">
            <div class="columns small-12 large-10">
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

    </div>
</div> <!-- Section -->
<?php return ob_get_clean();?>

