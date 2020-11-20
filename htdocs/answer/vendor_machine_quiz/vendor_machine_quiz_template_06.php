<?php

require_once "./vendor_machine_quiz_class_06.php";
require_once "./vendor_machine_quiz_function_06.php";

$user_request = getUserRequest($_POST);

$drink      = new DrinkVendorMachine($user_request);
$ice        = new IceVendorMachine($user_request);
$tabacco    = new TabaccoVendorMachine($user_request);
$news_paper = new NewsPaperVendorMachine($user_request);

$drink      = calcChange($drink);
$ice        = calcChange($ice);
$tabacco    = calcChange($tabacco);
$news_paper = calcChange($news_paper);

$drink      = switchReceiveChangeTag($drink);
$ice        = switchReceiveChangeTag($ice);
$tabacco    = switchReceiveChangeTag($tabacco);
$news_paper = switchReceiveChangeTag($news_paper);

$drink      = switchItemNameTag($drink);
$ice        = switchItemNameTag($ice);
$tabacco    = switchItemNameTag($tabacco);
$news_paper = switchItemNameTag($news_paper);

$message = chooseMessage($drink, $ice, $tabacco, $news_paper);

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
            <h1>問題 6</h1>
            <form class="vendor-machine-form" action="vendor_machine_quiz_template_06.php" method="post">
                <div class="row">
                    <div class="col vendor-machines">
                        <div class="container">

                            <h2>ドリンク</h2>
                            <div class="row vendor-machine drink">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $drink::ITEM_NAME_01; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $drink->getPrice($drink::ITEM_NAME_01); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $drink->getItemNameTag($drink::ITEM_NAME_01); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $drink::ITEM_NAME_02; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $drink->getPrice($drink::ITEM_NAME_02); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $drink->getItemNameTag($drink::ITEM_NAME_02); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $drink::ITEM_NAME_03; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $drink->getPrice($drink::ITEM_NAME_03); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $drink->getItemNameTag($drink::ITEM_NAME_03); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $drink::ITEM_NAME_04; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $drink->getPrice($drink::ITEM_NAME_04); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $drink->getItemNameTag($drink::ITEM_NAME_04); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $drink::ITEM_NAME_05; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $drink->getPrice($drink::ITEM_NAME_05); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $drink->getItemNameTag($drink::ITEM_NAME_05); ?>
                                    </div>
                                </div>
                                <input type="text" name="drink_money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay_drink_money" value="お金を入れる">
                                <?php echo $drink->getChangeTag(); ?>
                                <?php echo $drink->getHiddenChangeTag(); ?>
                                <?php echo $drink->getRecieveChangeTag(); ?>
                            </div>

                            <h2>アイス</h2>
                            <div class="row vendor-machine ice">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $ice::ITEM_NAME_01; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $ice->getPrice($ice::ITEM_NAME_01); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $ice->getItemNameTag($ice::ITEM_NAME_01); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $ice::ITEM_NAME_02; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $ice->getPrice($ice::ITEM_NAME_02); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $ice->getItemNameTag($ice::ITEM_NAME_02); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $ice::ITEM_NAME_03; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $ice->getPrice($ice::ITEM_NAME_03); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $ice->getItemNameTag($ice::ITEM_NAME_03); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $ice::ITEM_NAME_04; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $ice->getPrice($ice::ITEM_NAME_04); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $ice->getItemNameTag($ice::ITEM_NAME_04); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $ice::ITEM_NAME_05; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $ice->getPrice($ice::ITEM_NAME_05); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $ice->getItemNameTag($ice::ITEM_NAME_05); ?>
                                    </div>
                                </div>
                                <input type="text" name="ice_money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay_ice_money" value="お金を入れる">
                                <?php echo $ice->getChangeTag(); ?>
                                <?php echo $ice->getHiddenChangeTag(); ?>
                                <?php echo $ice->getRecieveChangeTag(); ?>
                            </div>
                        </div> <!-- .container -->
                    </div> <!-- .col .vendor-machines -->

                    <div class="col vendor-machines">
                        <div class="container">

                            <h2>タバコ</h2>
                            <div class="row vendor-machine tabacco">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $tabacco::ITEM_NAME_01; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $tabacco->getPrice($tabacco::ITEM_NAME_01); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $tabacco->getItemNameTag($tabacco::ITEM_NAME_01); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $tabacco::ITEM_NAME_02; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $tabacco->getPrice($tabacco::ITEM_NAME_02); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $tabacco->getItemNameTag($tabacco::ITEM_NAME_02); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $tabacco::ITEM_NAME_03; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $tabacco->getPrice($tabacco::ITEM_NAME_03); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $tabacco->getItemNameTag($tabacco::ITEM_NAME_03); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $tabacco::ITEM_NAME_04; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $tabacco->getPrice($tabacco::ITEM_NAME_04); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $tabacco->getItemNameTag($tabacco::ITEM_NAME_04); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $tabacco::ITEM_NAME_05; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $tabacco->getPrice($tabacco::ITEM_NAME_05); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $tabacco->getItemNameTag($tabacco::ITEM_NAME_05); ?>
                                    </div>
                                </div>
                                <input type="text" name="tabacco_money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay_tabacco_money" value="お金を入れる">
                                <?php echo $tabacco->getChangeTag(); ?>
                                <?php echo $tabacco->getHiddenChangeTag(); ?>
                                <?php echo $tabacco->getRecieveChangeTag(); ?>
                            </div>

                            <h2>新聞紙</h2>
                            <div class="row vendor-machine news-paper">
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $news_paper::ITEM_NAME_01; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $news_paper->getPrice($news_paper::ITEM_NAME_01); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $news_paper->getItemNameTag($news_paper::ITEM_NAME_01); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $news_paper::ITEM_NAME_02; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $news_paper->getPrice($news_paper::ITEM_NAME_02); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $news_paper->getItemNameTag($news_paper::ITEM_NAME_02); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $news_paper::ITEM_NAME_03; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $news_paper->getPrice($news_paper::ITEM_NAME_03); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $news_paper->getItemNameTag($news_paper::ITEM_NAME_03); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $news_paper::ITEM_NAME_04; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $news_paper->getPrice($news_paper::ITEM_NAME_04); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $news_paper->getItemNameTag($news_paper::ITEM_NAME_04); ?>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="vendor-machine-item">
                                        <p><?php echo $news_paper::ITEM_NAME_05; ?></p>
                                    </div>
                                    <div class="vendor-machine-price"><?php echo $news_paper->getPrice($news_paper::ITEM_NAME_05); ?></div>
                                    <div class="vendor-machine-item-btn">
                                        <?php echo $news_paper->getItemNameTag($news_paper::ITEM_NAME_05); ?>
                                    </div>
                                </div>
                                <input type="text" name="news_paper_money" size="10" maxlength="5" placeholder="数値">
                                <input type="submit" name="pay_news_paper_money" value="お金を入れる">
                                <?php echo $news_paper->getChangeTag(); ?>
                                <?php echo $news_paper->getHiddenChangeTag(); ?>
                                <?php echo $news_paper->getRecieveChangeTag(); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row message">
                    [メッセージ] <?php echo $message; ?>
                </div>
            </form>
        </div>
    </body>
</html>

