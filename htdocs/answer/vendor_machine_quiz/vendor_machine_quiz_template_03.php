<?php

require "./vendor_machine_quiz_class_03.php";
require "./vendor_machine_quiz_function_03.php";

$user_request = getUserRequest($_POST);

$drink      = new DrinkVendorMachine($user_request);
$ice        = new IceVendorMachine($user_request);
$tabacco    = new TabaccoVendorMachine($user_request);
$news_paper = new NewsPaperVendorMachine($user_request);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>問題 3</h1>
            <form class="vendor-machine-form" action="vendor_machine_quiz_template_03.php" method="post">
                <div class="row">
                    <div class="col vendor-machines">
                        <div class="container">

                            <h2>ドリンク</h2>
                            <div class="row vendor-machine drink">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>A</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="A" name="item_name" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>B</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="B" name="item_name" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>C</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="C" name="item_name" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>D</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="D" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>E</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="E" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <?php echo $drink->money_tag; ?>
                                <input type="submit" name="pay_drink_money" value="お金を入れる">
                                <?php echo $drink->change_tag; ?>
                                <input type="submit" name="get_drink_change" value="お釣り" disabled>
                            </div>

                            <h2>アイス</h2>
                            <div class="row vendor-machine ice">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>F</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="F" name="item_name" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>G</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="G" name="item_name" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>H</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="H" name="item_name" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>I</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="I" name="item_name" disabled>160</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>J</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="J" name="item_name" disabled>160</button>
                                    </div>
                                </div>
                                <?php echo $ice->money_tag; ?>
                                <input type="submit" name="pay_ice_money" value="お金を入れる">
                                <?php echo $ice->change_tag; ?>
                                <input type="submit" name="get_ice_change" value="お釣り" disabled>
                            </div>
                        </div> <!-- .container -->
                    </div> <!-- .col .vendor-machines -->

                    <div class="col vendor-machines">
                        <div class="container">

                            <h2>タバコ</h2>
                            <div class="row vendor-machine tabacco">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>K</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="K" name="item_name" disabled>400</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>L</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="L" name="item_name" disabled>410</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>M</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="M" name="item_name" disabled>450</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>N</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="N" name="item_name" disabled>500</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>O</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="O" name="item_name" disabled>540</button>
                                    </div>
                                </div>
                                <?php echo $tabacco->money_tag; ?>
                                <input type="submit" name="pay_tabacco_money" value="お金を入れる">
                                <?php echo $tabacco->change_tag; ?>
                                <input type="submit" name="get_tabacco_change" value="お釣り" disabled>
                            </div>

                            <h2>新聞紙</h2>
                            <div class="row vendor-machine news-paper">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>P</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="P" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>Q</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="Q" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>R</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="R" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>S</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="S" name="item_name" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>T</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="T" name="item_name" disabled>180</button>
                                    </div>
                                </div>
                                <?php echo $news_paper->money_tag; ?>
                                <input type="submit" name="pay_news_paper_money" value="お金を入れる">
                                <?php echo $news_paper->change_tag; ?>
                                <input type="submit" name="get_news_paper_change" value="お釣り" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>

