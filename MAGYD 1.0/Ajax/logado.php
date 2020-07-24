<?php
   session_start();
   if (!isset($_SESSION['usuario_autenticado']) or $_SESSION['usuario_autenticado'] != 'SIM') {
    header('location:logado.php');
   }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cantina-MAGYD</title>
        <meta charset="utf8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Link CSS -->
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">

        <!-- Link BOOTSTRAP-4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <script>
            var total = 0
            var x = 0
            //Funcao adiciona uma nova linha na tabela
            function adicionaLinha(idTabela, produto , sabor, valor) {
                total += valor
                var tabela = document.getElementById(idTabela);
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                linha.setAttribute('class', 'bordaLinhaTabela')
                var celula1 = linha.insertCell(0);
                celula1.setAttribute('class', 'alinhaTextoTabela')
                celula1.setAttribute('name', 'lnhProduto')
                var celula2 = linha.insertCell(1);
                celula2.setAttribute('class', 'alinhaTextoTabela')
                celula2.setAttribute('name', 'lnhSabor')
                var celula3 = linha.insertCell(2);
                celula3.setAttribute('class', 'alinhaTextoTabela')
                celula3.setAttribute('class', 'valor')
                var celula4 = linha.insertCell(3);
                celula4.setAttribute('class', 'alinhaTextoTabela')
                celula1.innerHTML = produto; 
                celula2.innerHTML = sabor;
                celula3.innerHTML = valor.toFixed(2);
                celula4.innerHTML =  "<button class='btn btn-danger' onclick='removeLinha(this)'><i class='fas fa-trash-alt fa-1x'></i></button>";
                document.getElementById('total').innerHTML = total.toFixed(2);
                x++
            }
            
            
            // funcao remove uma linha da tabela
            function removeLinha(linha) {
                //encontra a posição da linha na tabela
                var i=linha.parentNode.parentNode.rowIndex
                tabela = document.getElementById('tbl');
                //recupera o texto no campo valor
                valor = tabela.getElementsByTagName('tr')[i-1].getElementsByTagName('td')[2].innerText;
                //Calcula o Total
                total = total - valor;
                //mostra o Total
                document.getElementById('total').innerHTML = total.toFixed(2);
                //remove uma linha da tabela
                document.getElementById('tbl').deleteRow(i-1);
                
                
            }
            
            function Comprar_Carrinho(){
                var tabela = document.getElementById('tbl');
                var numeroLinhas = tabela.rows.length;
                var items = [];
                if(numeroLinhas > 0){
                    for(i = 0; i <= numeroLinhas-1; i++){
                        items[i] = tabela.getElementsByTagName('tr')[i].innerText;
                    }
                    
                }
                
            }   
            /* botão exluir conta*/
            function none() {
            document.getElementById('dropdown-content').style.display='inline-block';
                } 
            function Excluir_conta() {
            document.getElementById('dropdown-content').style.display='none';
            } 
        </script>
    </head>
  

    <body class="bg-dark">
        <header>
            <nav class="navbar navbar-expand-lg bg-warning ">
                <div class="container">
                    <a href="logado.php">
                    <img class="nav-brand" src="img/logo.png" width="102">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-topo">
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-topo">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <button class="btn btn-success mr-2 mt-2" data-toggle="modal" data-target="#modalMeusDados">
                                    <i class="far fa-edit mr-1"></i>Meus Dados
                                </button>
                            </li>
                            <li class="nav-item ">
                                <button data-toggle="modal" data-target="#modalPedidos" class="btn btn-success mr-2 mt-2 px-3">
                                    <i class="fas fa-barcode mr-1"></i>Pedidos
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-success mt-2 mb-2" data-toggle="modal" data-target="#modalCarrinho">
                                    <i class="fas fa-cart-arrow-down mr-1"></i>Carrinho
                                </button>
                            </li>

                            <li class="nav-item divisor"></li>


                            <li class="nav-item">
                                <a href="index.php" class="btn btn-danger mt-2 ">
                                    <i class="fas fa-user-plus mr-1"></i>Sair
                                </a>  
                            </li>
                            <!-- botão excluir -->
                            <div class="dropdown">
                                
                                <button ondblclick="none()" onclick="Excluir_conta()"class="dropbtn">&#9660;</button>                            
                        <div id="dropdown-content">                          
                                <a href="excluir_conta.php"><button type="submit" class="btn_excluir">Excluir conta</button></a>
                            </form>
                        </div>
                               
<style>
/* botão exluir conta */
.btn_excluir{
    background-color: #C0C0C0;
    color: red;
    display: inline-block;
    width: 108px;
    height: 30px;
}
.dropbtn{
    margin-left:3px;
    background-color: #C0C0C0;
    border-color: orange;
}
.dropdown{
    top: 8px;
    position: relative;
    display: inline;
}
#dropdown-content{
    width: 50px;
    display: none;
     margin-left:2px;
    position: absolute;
    z-index: 1;
}
.dropbtn:hover{
    background-color: #ddd;
}
.dropdown:hover #dropdown-content{
    display: inline;
}
.dropdown:hover .dropbtn{
    background-color: #C0C0C0;
}
</style>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section id="home">
            <div class="container align-self-center">
                <div class="row">
                    <div class="col-md-12 capa">
                
                        <div id="carousel-promocoes" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/banner3.png" class="img-fluid">
                                </div>

                                <div class="carousel-item">
                                    <img src="img/banner2.png" class="img-fluid">
                                </div>

                                <div class="carousel-item">
                                    <img src="img/Banner1.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <a href="#carousel-promocoes" class="carousel-control-prev" data-slide="prev">
                            <i class="fas fa-angle-left fa-3x"></i>
                        </a>
                        <a href="#carousel-promocoes" class="carousel-control-next" data-slide="next">
                            <i class="fas fa-angle-right fa-3x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Inicio Seção Salgados -->
        <section class="d-flex mb-5">
            <div class="container"><hr>
                
                <h1 class="cor-secao">Salgados</h1><hr>
                <div class="align-self-center">
                    <div class="row mb-4 mt-4">
                        <div class="col-6 col-md-4 col-lg-3 mb-2">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/hamburger.jpg" width="100%" alt="">
                                    <label class="ml-3">hamburguer R$5.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'hamburguer', '', 5.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
 <!-- ALTERAÇÃO DO LINK DE PAGAMENTO ALEX--><a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/pastel.jpg" width="100%" alt="">
                                    <label class="ml-3">Pastel R$3.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Pastel', 'Calabresa', 3.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/misto.jpg" width="100%" alt="">
                                    <label class="ml-3">Misto R$3.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Misto', 'Queijo com Presunto', 3.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/coxinha.jpg" width="100%" alt="">
                                    <label class="ml-3">Coxinha1 R$3.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Coxinha', 'Frango com Catupiry', 3.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <!-- Nova linha 1 de produtos alex-->
                         <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/mistoquente.jpg" width="100%" alt="">
                                    <label class="ml-3">Misto Quente R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Misto Quente', '', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <!-- Nova linha 2 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/torta.jpg" width="100%" alt="">
                                    <label class="ml-3">Torta de Frango R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Torta', 'Frango', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                              <!-- Nova linha 3 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/misto.jpg" width="100%" alt="">
                                    <label class="ml-3">Misto R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Misto', '', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                         <!-- Nova linha 4 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/paoqueijo.jpg" width="100%" alt="">
                                    <label class="ml-3">Pão de Queijo R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Pão de Queijo', '', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fim Seção Salgados -->

        <!-- Inicio Seção Bebidas -->
        <section>
            <div class="container"><hr>
                
                <h1 class="cor-secao">Bebidas Geladas</h1><hr>
                <div class="align-self-center">
                    <div class="row mb-4 mt-4">
                        <div class="col-6 col-md-4 col-lg-3 mb-2">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/sucocaixa.jpg" width="100%" alt="">
                                    <label class="ml-3">Suco em Caixa R$3.50</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Suco Em Caixa', '', 3.50)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/sucolaranja.png" width="100%" alt="">
                                    <label class="ml-3">Suco Natural R$4.50</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Suco Natural', '',4.50)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/refri.jpeg" width="100%" alt="">
                                    <label class="ml-3">Refrigerante R$3.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Refrigerante', 'Cola', 3.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/guaraviton.jpg" width="100%" alt="">
                                    <label class="ml-3">Guaraviton R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Guaraviton', 'Guarana e Açai', 4.00)" class="btn btn-success ml-2 mb-3" type="submit" id="Coxinha1"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                        <button  class="btn btn-success ml-2 mb-3" type="button" id="Coxinha1"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <!-- Nova linha 1 de produtos alex-->
                         <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/gatorade.jpg" width="100%" alt="">
                                    <label class="ml-3">Gatorade R$5.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Gatorade', 'Laranja', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                            <!-- Nova linha 2 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/tonica.jpg" width="100%" alt="">
                                    <label class="ml-3">Tonica R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Tonica', '', 3.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                              <!-- Nova linha 3 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/xtapa.jpg" width="100%" alt="">
                                    <label class="ml-3">Xtapa R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Xtapa', 'Uva', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                         <!-- Nova linha 4 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/dolly.jpg" width="100%" alt="">
                                    <label class="ml-3">Guarana R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Guarana', '', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="cor-secao">Bebidas Quente</h1><hr>
                <div class="align-self-center">
                    <div class="row mb-4 mt-4">
                        <div class="col-6 col-md-4 col-lg-3 mb-2">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/cafe.jpeg" width="100%" alt="">
                                    <label class="ml-3">Café com Leite R$3.50</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Café com Leite', '', 3.50)" class="btn btn-success ml-2 mb-3" type="submit" ><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin" class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/cafe1.jpeg" width="100%" alt="">
                                    <label class="ml-3">Chá Quente R$4.50</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Chá Quente', '',4.50)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin" class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/cafe2.jpeg" width="100%" alt="">
                                    <label class="ml-3"> Café Puro R$3.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Café Puro','', 3.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin" class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/cafe3.jpeg" width="100%" alt="">
                                    <label class="ml-3"> Cappuccino R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Cappuccino', '', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nova linha 1 de produtos alex-->
                         <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/macchiato.jpg" width="100%" alt="">
                                    <label class="ml-3">Macchiato R$4.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Macchiato', 'Italiano', 4.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                            <!-- Nova linha 2 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/chocoquente.jpg" width="100%" alt="">
                                    <label class="ml-3">Chocolate Quente R$5.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Chocolate Quente', '', 5.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                              <!-- Nova linha 3 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/quentaochoco.jpg" width="100%" alt="">
                                    <label class="ml-3">Quentão de Chocolate R$5.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Quentão de Chocolate', '', 5.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>

                         <!-- Nova linha 4 de produtos alex-->
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="bg-warning borda-items"> 
                                <div class="items">
                                    <img class="img-fluid p-3" src="img/quentaochoco.jpg" width="100%" alt="">
                                    <label class="ml-3">Quentão de Chocolate R$5.00</label><br>
                                    <button onclick="adicionaLinha('tbl', 'Quentão de Chocolate ', '', 5.00)" class="btn btn-success ml-2 mb-3" type="submit"><i class="fas fa-cart-plus"></i>Carrinho</button>
                                    <a href="comprar.php">
                                    <button data-toggle="modal" data-target="#modalLogin"  class="btn btn-success ml-2 mb-3" type="button"><i class="fas fa-credit-card mr-1"></i>Comprar</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Fim Seção Salgados -->

        <!-- Inicio Sessão Rodapé -->
        <footer class="mt-4 p-4 bg-warning">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        MAGYD
                        &copy;Todos os direitos reservados<br>
                        Av Capitão Mor Aguiar, 978, Centro, São Vicente-SP<br>
                        Tel.:(12) 12345-6789 <br> 
                        E-mail: Magyd@gmail.com
                    </div>
                    <div class="col-12 col-lg-6 mt-auto mb-auto d-flex flex-row-reverse">
                        <a href="https://www.instagram.com/?hl=pt-br" target="_blank">
                            <i class="fab fa-instagram fa-3x ml-1"></i>
                        </a>
                        <a href="https://facebook.com" target="_blank">
                            <i class="fab fa-facebook-square fa-3x ml-1"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank">
                            <i class="fab fa-whatsapp-square fa-3x ml-1"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank">
                            <i class="fab fa-twitter-square fa-3x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Fim Sessão Rodapé -->


        <!-- Inicio Modal Carrinho -->
        <div class="modal fade" id="modalCarrinho" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Carrinho</h4>
                        <button type="button" class="close" data-dismiss="modal" area-label="Close"><span>&times;</span></button>
                        
                    </div>
                    <div class="modal-body">
                        <table class="ml-auto mr-auto">
                            <thead>
                                <tr>
                                    <th class="alinhaTextoTabela">Produto</th>
                                    <th class="alinhaTextoTabela">Sabor</th>
                                    <th class="alinhaTextoTabela">Valor</th>
                                    <th class="alinhaTextoTabela">Acao</th>
                                </tr>
                            </thead>
                            <tbody id="tbl">
                                
                            </tbody>
                        </table>
                        <div style="text-align: right; margin-right: 50px;">Total: <label id="total"></label></div>
                        <center>
                            <form>
                                <input type="submit" onclick="Comprar_Carrinho()" class="btn btn-success" name="btn_Comprar" value="Comprar">
                            </form>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Carrinho -->

        <!-- Inicio Modal Meus Pedidos -->
        <div class="modal fade" id="modalPedidos" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Meus Dados</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        
                        <center>
                            <?php echo $_SESSION['pedidos']?>
                        </center>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Meus Pedidos -->

        <!-- Inicio Modal Meus Dados -->
        <div class="modal fade" id="modalMeusDados" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Meus Dados</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="Verifica_Login.php" class="form-group  mt-2">

                            ID:<label><?php echo $_SESSION['Id'] ?></label><br>
                            Nome:<br>
                            <label><?php echo $_SESSION['usuario'] ?></label><br>
                            E-mail:<br>
                            <label><?php echo $_SESSION['email'] ?></label><br>
                            Telefone:<br>
                            <label><?php echo $_SESSION['fone'] ?></label><br>
                            Data De Nascimento:<br>
                            <label><?php echo $_SESSION['dataNasc'] ?></label><br>
                            Senha:<br>
                            <label>**********</label><br>
                            <center>
                                <button class=" mt-5 mr-3 btn btn-success"data-toggle="modal" data-target="#modal_Alterar_MeusDados" data-dismiss="modal" >Alterar</button>
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Meus Dados -->

            <!-- Inicio Modal Alterar dados -->
        <div class="modal fade" id="modal_Alterar_MeusDados" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Alterar Meus Dados</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="update_Dados_pessoais.php" class="form-group  mt-2">
                            <input type="text" hidden name="Altera_id" value="<?php echo $_SESSION['Id'] ?>"readonly>
                            Nome:<br>
                            <input type="text" name="alterar_nome" class="form-control mt-1 mb-4"required>
                            E-mail:<br>
                             <input type="text" name="alterar_email" class="form-control mt-1 mb-4"required>
                             Telefone:<br>
                             <input type="text" name="alterar_fone" class="form-control mt-1 mb-4"required>
                            Data De Nascimento:<br>
                             <input type="date" name="alterar_nascimento" class="form-control mt-1 mb-4"required>
                            Senha:<br>
                             <input type="password" name="alterar_senha" class="form-control mt-1 mb-4">
                            <center>
                                <input type="submit" class=" mt-5 mr-3 btn btn-success" value="Atualizar Dados">
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Meus Dados -->




        <!-- Scripts Do BootStrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>