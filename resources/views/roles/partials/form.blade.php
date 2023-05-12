<div class="card-body">
  <div class="form-row">
    <div class="form-group col-lg-12">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del nuevo cargo']) !!}
    </div>
    @error('name')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <h2 class="h3">Lista de Permisos</h2>
<br>
  <div class="form-row">

    {{-- MODULO PROYECTOS --}}
    <div class="form-group col-lg-4">
      <div class="mb-3 card border-secondary">
        <div class="card-header">
          @foreach ($permissions as $permission)
            @if ($permission->modulo == 'moduloProyectos')
              <div>
                <label>
                  {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                  {{ $permission->description }}
                </label>
              </div>
            @endif
          @endforeach
        </div>
        <div class="card-body text-secondary">
          <div class="form-row">
            {{-- PROYECTOS --}}
            <div class="form-group col-lg-12">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'BandejaProyectos')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'Proyectos')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- MODULO PERSONAS --}}
    <div class="form-group col-lg-8">
      <div class="mb-3 card border-secondary">
        <div class="card-header">
          @foreach ($permissions as $permission)
            @if ($permission->modulo == 'moduloPersonas')
              <div>
                <label>
                  {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                  {{ $permission->description }}
                </label>
              </div>
            @endif
          @endforeach
        </div>

        <div class="card-body text-secondary">
          <div class="form-row">
            {{-- CLIENTES --}}
            <div class="form-group col-lg-6">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'BandejaClientes')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'Clientes')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>

            {{-- USUARIOS --}}
            <div class="form-group col-lg-6">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'BandejaUsuarios')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'Usuarios')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>   

          </div>
        </div>
      </div>
    </div>

    

    {{-- MODULO MANTENIMIENTO --}}
    <div class="form-group col-lg-8">
      <div class="mb-3 card border-secondary">
        <div class="card-header">
          @foreach ($permissions as $permission)
            @if ($permission->modulo == 'moduloMantenimientos')
              <div>
                <label>
                  {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                  {{ $permission->description }}
                </label>
              </div>
            @endif
          @endforeach
        </div>
        <div class="card-body text-secondary">
          <div class="form-row">
            {{-- ROLES --}}
            <div class="form-group col-lg-6">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'BandejaRoles')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'Roles')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>

            {{-- ESTADOS --}}
            <div class="form-group col-lg-6">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'BandejaEstados')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'Estados')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
    </div>

    {{-- MODULO REPORTES --}}
    <div class="form-group col-lg-4">
      <div class="mb-3 card border-secondary">
        <div class="card-header">
          @foreach ($permissions as $permission)
            @if ($permission->modulo == 'moduloReportes')
              <div>
                <label>
                  {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                  {{ $permission->description }}
                </label>
              </div>
            @endif
          @endforeach
        </div>
        <div class="card-body text-secondary">
          <div class="form-row">
            {{-- ENVIOS --}}
            <div class="form-group col-lg-12">
              <div class="mb-3 card border-secondary">
                <div class="card-header">
                  <b>REPORTES</b>
                </div>
                <div class="card-body text-secondary">
                  @foreach ($permissions as $permission)
                    @if ($permission->modulo == 'ReporteVentas')
                      <div>
                        <label>
                          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                          {{ $permission->description }}
                        </label>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
