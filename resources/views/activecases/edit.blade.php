@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Active Cases Log Entry</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('activecases.update', $entry->date_issued) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="date_issued" class="col-md-4 col-form-label text-md-right">{{ __('Date Issued') }}</label>

                            <div class="col-md-6">
                                <input id="date_issued" type="date" class="form-control @error('date_issued') is-invalid @enderror" name="date_issued" value="{{ $entry->date_issued }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmed" class="col-md-4 col-form-label text-md-right">{{ __('Confirmed') }}</label>

                            <div class="col-md-6">
                                <input id="confirmed" type="number" class="form-control @error('confirmed') is-invalid @enderror" name="confirmed" value="{{ $entry->confirmed }}" required>

                                @error('confirmed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="probable" class="col-md-4 col-form-label text-md-right">{{ __('Probable') }}</label>

                            <div class="col-md-6">
                                <input id="probable" type="number" class="form-control @error('probable') is-invalid @enderror" name="probable" value="{{ $entry->probable }}" required>

                                @error('probable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="suspected" class="col-md-4 col-form-label text-md-right">{{ __('Suspected') }}</label>

                            <div class="col-md-6">
                                <input id="suspected" type="number" class="form-control @error('suspected') is-invalid @enderror" name="suspected" value="{{ $entry->suspected }}" required>

								@error('suspected')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reference" class="col-md-4 col-form-label text-md-right">{{ __('Reference URL') }}</label>

                            <div class="col-md-6">
                                <input id="reference" type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ $entry->reference }}" required>

                                @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Log Entry') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
