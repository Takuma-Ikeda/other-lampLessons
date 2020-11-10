<?php

require "./vendor_machine_quiz_*.php";

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
            <h1>テンプレート</h1>
            <form class="vendor-machine-form" action="vendor_machine_quiz_*.php" method="post">
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
                                        <button type="submit" value="A" name="drink-buy" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>B</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="B" name="drink-buy" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>C</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="C" name="drink-buy" disabled>120</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>D</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="D" name="drink-buy" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>E</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="E" name="drink-buy" disabled>150</button>
                                    </div>
                                </div>
                                <input type="text" name="drink-money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay-drink-money" value="お金を入れる">
                                <input type="text" name="drink-change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>
                                <input type="submit" name="get-drink-change" value="お釣り" disabled>
                            </div>

                            <h2>アイス</h2>
                            <div class="row vendor-machine ice">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>F</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="F" name="ice-buy" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>G</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="G" name="ice-buy" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>H</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="H" name="ice-buy" disabled>130</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>I</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="I" name="ice-buy" disabled>160</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>J</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="J" name="ice-buy" disabled>160</button>
                                    </div>
                                </div>
                                <input type="text" name="ice-money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay-ice-money" value="お金を入れる">
                                <input type="text" name="ice-change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>
                                <input type="submit" name="get-ice-change" value="お釣り" disabled>
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
                                        <button type="submit" value="K" name="tabacco-buy" disabled>400</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>L</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="L" name="tabacco-buy" disabled>410</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>M</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="M" name="tabacco-buy" disabled>450</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>N</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="N" name="tabacco-buy" disabled>500</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>O</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="O" name="tabacco-buy" disabled>540</button>
                                    </div>
                                </div>
                                <input type="text" name="tabacco-money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay-tabacco-money" value="お金を入れる">
                                <input type="text" name="tabacco-change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>
                                <input type="submit" name="get-tabacco-change" value="お釣り" disabled>
                            </div>

                            <h2>新聞紙</h2>
                            <div class="row vendor-machine news-paper">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>P</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="P" name="news-paper-buy" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>Q</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="Q" name="news-paper-buy" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>R</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="R" name="news-paper-buy" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>S</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="S" name="news-paper-buy" disabled>150</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p>T</p>
                                    </div>
                                    <div class="vendor-machine-item-btn">
                                        <button type="submit" value="T" name="news-paper-buy" disabled>180</button>
                                    </div>
                                </div>
                                <input type="text" name="news-paper-money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay-news-paper-money" value="お金を入れる">
                                <input type="text" name="news-paper-change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>
                                <input type="submit" name="get-news-paper-change" value="お釣り" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>

