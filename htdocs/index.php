<?php
error_reporting(-1); // 全ての PHP エラーを表示する

require_once(__DIR__ . '/app/Helper.php');

use App\Helper;

ob_start(); // 出力バッファリング開始（echo、var_dumpした内容を内部バッファに保存）

// 結果が true のパターン
$actualValuesForTrueCase = [];
$actualValuesForTrueCase[] = Helper::same(1, 1, 1);
$actualValuesForTrueCase[] = Helper::same(2, 2, 2);
$actualValuesForTrueCase[] = Helper::same('a', 'a', 'a');

// 結果が false のパターン
$actualValuesForFalseCase = [];
$actualValuesForFalseCase[] = Helper::same(1, 1, 2);
$actualValuesForFalseCase[] = Helper::same(1, 2, 1);
$actualValuesForFalseCase[] = Helper::same(2, 1, 1);
$actualValuesForFalseCase[] = Helper::same(2, 2, '2');
$actualValuesForFalseCase[] = Helper::same(2, '2', 2);
$actualValuesForFalseCase[] = Helper::same('2', 2, 2);
$actualValuesForFalseCase[] = Helper::same('b', 'a', 'a');
$actualValuesForFalseCase[] = Helper::same('a', 'b', 'a');
$actualValuesForFalseCase[] = Helper::same('a', 'a', 'b');

$outContents = ob_get_clean(); // 出力バッファ取得・出力バッファ消去・出力バッファリング停止
?>
<!-- ↓↓↓HTML -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>課題01</title>
    <style>
        pre {
            border: 1px solid black;
            padding: 6px;
        }
    </style>
</head>

<body>
    <h1>課題01</h1>
    <?php if (!empty($outContents)) { ?>
    <section>
        <h2>不正出力</h2>
        <p>メソッド内で不正な出力を検知しました（var_dump、echo等）。</p>
        <pre><?= $outContents ?></pre>
    </section>
    <?php } ?>
    <section>
        <h2>trueパターン</h2>
        <p>結果が全て bool(true) になっていること</p>
        <pre><?php
            foreach ($actualValuesForTrueCase as $actualValue) {
                var_dump($actualValue);
            }
        ?></pre>
    </section>
    <section>
        <h2>falseパターン</h2>
        <p>結果が全て bool(false) になっていること</p>
        <pre><?php
            foreach ($actualValuesForFalseCase as $actualValue) {
                var_dump($actualValue);
            }
        ?></pre>
    </section>
</body>

</html>