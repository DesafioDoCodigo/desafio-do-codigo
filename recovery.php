<?php
session_start();

header("Location: /desafio/loginantigo.php?recovery=".$_GET['code']."&user=".$_GET['user']);