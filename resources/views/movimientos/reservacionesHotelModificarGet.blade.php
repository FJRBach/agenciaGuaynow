<div class="modal fade" id="modalModificarHotel{{ $reservacion->IDReservacion }}" tabindex="-1" aria-labelledby="modalModificarHotelLabel{{ $reservacion->IDReservacion }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarHotelLabel{{ $reservacion->IDReservacion }}">MODIFICAR HOTEL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size: 19px;">
                <form action="{{ route('rhotel.update', ['IDReservacion' => $reservacion->IDReservacion]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="text-center">DATOS DEL CLIENTE: {{ $reservacion->cliente->NIFCliente }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4"><strong>CLIENTE:</strong> {{ $reservacion->cliente->nombre }}</div>
                                <div class="col-md-4"><strong>EMAIL:</strong> {{ $reservacion->cliente->email }}</div>
                                <div class="col-md-4"><strong>TELÉFONO:</strong> {{ $reservacion->cliente->telefono }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3 text-center ">
                        <label for="IDHotel">HOTEL:</label>
                        <div class=" d-flex justify-content-center">
                            <select class="form-control text-center" style="width: 240px; font-size: 20px;" id="IDHotel" name="IDHotel">
                                @foreach($hoteles as $hotel)
                                    <option value="{{ $hotel->IDHotel }}" {{ $reservacion->detailReservVueloHotel && $hotel->IDHotel == $reservacion->detailReservVueloHotel->IDHotel ? 'selected' : '' }}>
                                        {{ $hotel->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <label for="IDRegimenHospedaje">RÉGIMEN DE HOSPEDAJE:</label>
                        <div class=" d-flex justify-content-center">
                            <select class="form-control" id="IDRegimenHospedaje" name="IDRegimenHospedaje" required  style="width: 220px; font-size: 20px;">
                                @foreach($regimenesHospedaje as $regimen)
                                    <option class="text-center" value="{{ $regimen->IDRegimenH }}" {{ $reservacion->detailReservVueloHotel && $regimen->IDRegimenH == $reservacion->detailReservVueloHotel->IDRegimenHospedaje ? 'selected' : '' }}>
                                        {{ $regimen->descripcionRegimen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <label for="horaRegimen">HORA DE INICIO DE HOSPEDAJE:</label>
                        <div class=" d-flex justify-content-center">
                            <input type="time" class="form-control" id="horaRegimen" name="horaRegimen" value="{{ $reservacion->detailReservVueloHotel ? \Carbon\Carbon::parse($reservacion->detailReservVueloHotel->fechaHoraRegimen)->format('H:i') : '' }}" required style="width: 168px; font-size: 21.5px;">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control" id="horaRegFin" name="horaRegFin" value="{{ $reservacion->detailReservVueloHotel ? \Carbon\Carbon::parse($reservacion->detailReservVueloHotel->fechaHoraRegFin)->format('H:i') : '' }}" required>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <label for="estado">ESTADO:</label>
                        <div class=" d-flex justify-content-center">
                        <select class="form-control text-center" id="estado" name="estado" style="font-size:19px; width:164px;" required>
                            <option value="1" {{ $reservacion->estado == 1 ? 'selected' : '' }}>ACTIVO</option>
                            <option value="0" {{ $reservacion->estado == 0 ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-edit">
                        <img src="{{ asset('update.png') }}" alt="MOD" style="width: 48px; height: 48px;">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
