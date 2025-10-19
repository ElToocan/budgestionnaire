@extends('adminlte::page')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-university"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Sold actuel </span>
                                <span
                                    class="info-box-number"> {{ $account->sold ? $account->sold.' €' : 'pas de compte'   }}  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total ajouté </span>
                                <span
                                    class="info-box-number"> {{ $transactions->where('value', '>', 0)->sum('value') ? $transactions->where('value', '>',0)->sum('value') .' €'  : 'pas de transaction enreegistrée' }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total dépensé</span>

                                <span
                                    class="info-box-number"> {{ $transactions->where('value','<',0)->sum('value') ? $transactions->where('value','<',0)->sum('value') .' €'  : 'pas de transaction enreegistrée' }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"> Derinière transaction </span>
                                <span class="info-box-number"> {{ $lastTransaction ? $lastTransaction->value.' €' : 'pas de transaction enregistrée' }} <small> {{  $lastTransaction->budget_id !== null ? 'Budget :' . \App\Models\Budget::find($lastTransaction->budget_id)->name : ' ' }} </small> </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                </div>

                <h3> Budgets </h3>


                @foreach($budgets as $budget)

                    <div class="progress-group mb-3">
                        {{$budget->name}}
                        <span class="float-right"> restant <b>{{ $budget->remainingValue }}</b>/ {{ $budget->maxValue }}  €</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger"
                                 style="width: {{ 100 - $budget->remainingValue /$budget->maxValue * 100 }}%"></div>
                            <div class="progress-bar bg-gray-dark"
                                 style="width:  {{ $budget->remainingValue /$budget->maxValue * 100  }}%"></div>
                        </div>
                    </div>

                @endforeach

                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf

                    <label for="value"> Ajouter une transaction </label><br>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type" value="positive" required>
                        <label class="form-check-label" for="positive"> Revenu </label>
                    </div>

                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="type" id="negative" value="negative">
                        <label class="form-check-label" for="negative"> Dépense </label>
                    </div>

                    <div class="form-group">
                        <input type="number" name="value" class="form-control" id="value" placeholder="Valeur" required>
                    </div>

                    <div class="form-group">
                        <label for="budget_id">Sélectionner un budget</label>
                        <select name="budget_id" id="budget_id" class="form-control select2" style="width: 100%;"
                                required>
                            <option value="0"> Compte principale / pas dans un budget</option>
                            @foreach($budgets as $budget)
                                <option value="{{ $budget->id }}">{{ $budget->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reason">Raison</label>
                        <input type="text" name="reason" class="form-control" id="reason" placeholder="Raison" required>
                    </div>

                    <button type="submit" class="btn btn-default mb-3">Ajouter</button>
                </form>


            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
