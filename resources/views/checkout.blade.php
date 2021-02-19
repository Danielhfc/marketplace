@extends('layouts.front')


@section('content')

    <div class="container">
        <form action="" method="post">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label >Número do Cartão</label>
                        <input type="text" class="form-control" name="card_number">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label >Mês de expiração</label>
                        <input type="text" class="form-control" name="card_month">
                    </div>
                </div>

                    <div class="col-md-2 form-group">
                        <label >Ano de expiração</label>
                        <input type="text" class="form-control" name="card_year">
                    </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label >Código de segurança</label>
                        <input type="text" class="form-control" name="card_cvv">
                    </div>
                </div>
    
                <button class="btn btn-succes btn-lg">Efetuar Pagamento</button>

            </div>
        </form>
    </div>

@endsection