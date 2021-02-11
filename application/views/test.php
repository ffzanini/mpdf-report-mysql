<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?= $title; ?>">
	<meta name="author" content="<?= $title; ?>">

  <title><?= $title; ?></title>
  
  <style>
    table, th, td {
      border: 1px solid black;
      text-align: center;
    }
  </style>
</head>

<body>
<table>
  <thead>
    <tr>
        <th hidden>ID</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Quantidade</th>
        <th>Preço de Compra</th>
        <th>Preço de Venda</th>
        <th>Resultado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($alltests as $r_alltests) :?>
        <tr>
            <td hidden><?= $r_alltests['id'] ?></td>
            <?php 
              //pega a data no formato xxxx-xx-xx e converte para xx/xx/xxxx
              $originalDate = $r_alltests['data'];
              $newDate = date("d/m/Y", strtotime($originalDate));
            ?>
            <td><?= $newDate ?></td>
            <td><?= $r_alltests['hora'] ?></td>
            <td><?= $r_alltests['quantidade'] ?></td>
            <?php
              //ajusta o valor do banco de dados para o formato correto de moeda
              $newValueBuyPrice = number_format($r_alltests['compra'],2,",",".");
            ?>
            <td>R$ <?= $newValueBuyPrice ?></td>
            <?php
              //ajusta o valor do banco de dados para o formato correto de moeda
              $newValueSellPrice = number_format($r_alltests['venda'],2,",",".");
            ?>
            <td>R$ <?= $newValueSellPrice ?></td>
            <?php
              //ajusta o valor do banco de dados para o formato correto de moeda
              $newValueResult = number_format($r_alltests['resultado'],2,",",".");
            ?>
            <td>R$ <?= $newValueResult ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>            
</body>
</html>
