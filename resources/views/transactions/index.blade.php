@extends('adminlte::page')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transactions</h1>
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
                        <th> Id</th>
                        <th> Valeur</th>
                        <th> Raison</th>
                        <th> Nom du Budget</th>
                        <th> date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)

                        <tr>
                            <td> {{ $transaction->id }} </td>
                            <td> {{ $transaction->value }} <i
                                    class="{{ $transaction->value >= 0 ? 'fa fa-arrow-up text-green' : 'fa fa-arrow-down text-red' }}"></i>
                            </td>
                            <td> {{ $transaction->reason }}</td>
                            <td> {{ $transaction->budget != null ? $transaction->budget->name : 'compte principale'}} </td>
                            <td> {{ $transaction->created_at->format('d/m/y') }} </td>
                            {{--                                <td> <button class="btn btn-block btn-default btn-xs"> Modifier </button></td>--}}
                            <td> {{-- Bouton Delete --}}
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette transaction ?');"
                                        type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@endsection
