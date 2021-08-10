@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-body"> --}}
                    <h1>Current Cases Log Entries</h1>
                    <a href="{{ route('activecases.create') }}" role="button" class="btn btn-primary">Create Log Entry</a>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered bg-white">
                            <thead>
                                <th>Actions</th>
                                <th>Date</th>
                                <th class="text-danger">Confirmed</th>
                                <th class="text-primary">Probable</th>
                                <th class="text-info">Suspected</th>
                            </thead>
                            @foreach($data as $entry)
                            <tr>
                                <td>
                                    <a href="{{ route('activecases.edit', $entry->date_issued) }}" class="btn btn-sm btn-primary" role="button">Edit</a>
                                </td>
                                <td class="pt-3">{{ date('m/d/Y', strtotime($entry->date_issued)) }}</td>
                                <td class="pt-3 text-danger">{{ $entry->confirmed }}</td>
                                <td class="pt-3 text-primary">{{ $entry->probable }}</td>
                                <td class="pt-3 text-info">{{ $entry->suspected }}</td>
                            </tr>
                            @endforeach
                            
                        </table>
                        <p>Showing {{ (($currentPage - 1) * $perPage) + 1 }} - {{ (($currentPage - 1) * $perPage) + $count }} of {{ $totalCount }} entries</p>
                    </div>
                    
                {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
    @endsection
    