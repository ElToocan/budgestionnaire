@extends('blank')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Budgets</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">

                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th> Nom</th>
                            <th> Valeur alloué</th>
                            <th> Valeur restante</th>
                            <th> Valeur dépensé</th>
                            <th> Barre de progression</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($budgets as $budget)

                            <tr>
                                <td> {{ $budget->name }} </td>
                                <td> {{ $budget->maxValue }} €</td>
                                <td> {{ $budget->remainingValue }} €</td>
                                <td> {{ $budget->maxValue - $budget->remainingValue }} €</td>
                                <td>
                                    <span> restant <b>{{ $budget->remainingValue }}</b>/ {{ $budget->maxValue }}  €</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger"
                                             style="width: {{ 100 - $budget->remainingValue /$budget->maxValue * 100 }}%"></div>
                                        <div class="progress-bar bg-gray-dark"
                                             style="width:  {{ $budget->remainingValue /$budget->maxValue * 100  }}%"></div>
                                    </div>
                                </td>
                                {{--                                <td> <button class="btn btn-block btn-default btn-xs"> Modifier </button></td>--}}
                                <td> {{-- Bouton Delete --}}
                                    <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce budget ?');"
                                            type="submit"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('budgets.store') }}" method="POST">
                        @csrf

                        <label> Crée un budget </label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
                            </div>

                            <div class="form-group">
                                <input type="text" name="maxValue" class="form-control" id="maxValue" placeholder="Valeur allouée">
                            </div>

                            <button class="btn btn-success "> <i class="fa fa-plus"></i> </button>

                    </form>

            </div>


        </section>
    </div>

@endsection
