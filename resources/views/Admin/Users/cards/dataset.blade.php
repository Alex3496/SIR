<!-- collapsed-card -->
<div class="card card-warning">
  <div class="card-header" data-card-widget="collapse">
    <h2 class="card-title">{{ __('Informacion de la compañia') }}</h2>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"> </i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <!-- START FORM-->
    {!! Form::open(['route' => ['admin.updateDataset',$userToEdit], 'method' => 'PUT']) !!}
      <div class="row">
        <div class="form-group col-md-7">
          {!! Form::label('dba_name','Nombre  DBA') !!}
          {!! Form::text('dba_name',$dataset->dba_name ?? '',['class' => 'form-control']) !!}
          @error('dba_name')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-7">
          {!! Form::label('scac_code','Código SCAC') !!}
          {!! Form::text('scac_code',$dataset->scac_code ?? '',['class' => 'form-control','placeholder' => 'ej. XXXX']) !!}
          @error('scac_code')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-7">
          {!! Form::label('caat','CAAT') !!}
          {!! Form::text('caat',$dataset->caat ?? '',['class' => 'form-control']) !!}
          @error('caat')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-7">
          {!! Form::label('mc_number','Número MC / MX') !!}
          {!! Form::text('mc_number',$dataset->mc_number ?? '',['class' => 'form-control']) !!}
          @error('mc_number')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-7">
          {!! Form::label('num_trucks','Número de camiones') !!}
          {!! Form::text('num_trucks',$dataset->num_trucks ?? '',['class' => 'form-control']) !!}
          @error('num_trucks')
            <small class="mt-0" style="color:red">{{ $message }}</small>
          @enderror
        </div>
      </div>
<!-- certificate_ctpat -->
      <div class="row">
        <div class="col-md-8">
          {!! Form::label('certificate_ctpat','Certificación C TPAT') !!}
          <div class="form-group row d-flex align-items-center">
            <div class="col-xl-3 row ml-2">
              <div class="form-check mr-2">
                  {!! Form::radio('hasC','0',$dataset->certificate_ctpat ?? true,
                    ['id' => 'hasC-0', 'class' => 'form-check-input', 'onchange' => 'disable("certificate_ctpat")']) !!}
                  {!! Form::label('hasC-0', 'No',['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check">
                  {!! Form::radio('hasC','1',$dataset->certificate_ctpat ?? '',
                    ['id' => 'hasC-1', 'class' => 'form-check-input', 'onchange' => 'disable("certificate_ctpat")']) !!}
                  {!! Form::label('hasC-1', 'Si',['class' => 'form-check-label']) !!}
              </div>
            </div>
            <div class="col mt-2 mt-xl-0">
              @if(isset($dataset->certificate_ctpat))
                {!! Form::text('certificate_ctpat',$dataset->certificate_ctpat ?? '',['class' =>'form-control']) !!}
              @else
                {!! Form::text('certificate_ctpat',$dataset->certificate_ctpat ?? '',['class' =>'form-control','disabled' => '']) !!}
              @endif
            </div>
            @error('certificate_ctpat')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>  
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          {!! Form::label('certificate_oae','Certificación OEA') !!}
          <div class="form-group row d-flex align-items-center">
            <div class="col-xl-3 row ml-2">
              <div class="form-check mr-2">
                  {!! Form::radio('hasOEA','0',$dataset->certificate_oae ?? true,
                    ['id' => 'hasOEA-0', 'class' => 'form-check-input', 'onchange' => 'disable("certificate_oae")'  ]) !!}
                  {!! Form::label('hasOEA-0', 'No',['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check">
                  {!! Form::radio('hasOEA','1',$dataset->certificate_oae ?? '',
                    ['id' => 'hasOEA-1', 'class' => 'form-check-input', 'onchange' => 'disable("certificate_oae")']) !!}
                  {!! Form::label('hasOEA-1', 'Si',['class' => 'form-check-label']) !!}
              </div>
            </div>
            <div class="col mt-2 mt-xl-0">
              @if(isset($dataset->certificate_oae))
                {!! Form::text('certificate_oae',$dataset->certificate_oae ?? '',['class' =>'form-control']) !!}
              @else
                {!! Form::text('certificate_oae',$dataset->certificate_oae ?? '',['class' =>'form-control','disabled' => '']) !!}
              @endif
            </div>
            @error('certificate_oae')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>  
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          {!! Form::label('fast','Fast') !!}
          <div class="form-group row d-flex align-items-center">
            <div class="col-xl-3 row ml-2">
              <div class="form-check mr-2">
                  {!! Form::radio('hasfAST','0', $dataset->fast ?? true,
                    ['id' => 'hasfAST-0', 'class' => 'form-check-input', 'onchange' => 'disable("fast")']) !!}
                  {!! Form::label('hasfAST-0', 'No',['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check">
                  {!! Form::radio('hasfAST','1',$dataset->fast ?? '',
                    ['id' => 'hasfAST-1', 'class' => 'form-check-input', 'onchange' => 'disable("fast")']) !!}
                  {!! Form::label('hasfAST-1', 'Si',['class' => 'form-check-label']) !!}
              </div>
            </div>
            <div class="col mt-2 mt-xl-0">
              @if(isset($dataset->fast))
                {!! Form::text('fast',$dataset->fast ?? '',['class' =>'form-control']) !!}
              @else
                {!! Form::text('fast',$dataset->fast ?? '',['class' =>'form-control','disabled' => '']) !!}
              @endif
            </div>
            @error('fast')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>  
        </div>
      </div>
      
      <h4 class="mb-4 mt-2">
        <b>{{ __('Otros servcios') }}</b>
      </h4>

      <div class="row">
        <div class="col-md-8">
          {!! Form::label('warehouse','Almacen') !!}
          <div class="form-group row d-flex align-items-center">
            <div class="col-xl-3 row ml-2">
              <div class="form-check mr-2">
                  {!! Form::radio('hasWarehouse','0',$dataset->warehouse ?? true,
                    ['id' => 'hasWarehouse-0', 'class' => 'form-check-input', 'onchange' => 'disable("warehouse")']) !!}
                  {!! Form::label('hasWarehouse-0', 'No',['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check">
                  {!! Form::radio('hasWarehouse','1',$dataset->warehouse ?? '',
                    ['id' => 'hasWarehouse-1', 'class' => 'form-check-input', 'onchange' => 'disable("warehouse")']) !!}
                  {!! Form::label('hasWarehouse-1', 'Si',['class' => 'form-check-label']) !!}
              </div>
            </div>
            <div class="col mt-2 mt-xl-0">
             @if(isset($dataset->warehouse))
                {!! Form::text('warehouse',$dataset->warehouse ?? '',['class' =>'form-control']) !!}
              @else
                {!! Form::text('warehouse',$dataset->warehouse ?? '',['class' =>'form-control','disabled' => '']) !!}
              @endif
            </div>
            @error('warehouse')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>  
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          {!! Form::label('fiscal_warehouse','Almacen Fiscal') !!}
          <div class="form-group row d-flex align-items-center">
            <div class="col-xl-3 row ml-2">
              <div class="form-check mr-2">
                  {!! Form::radio('hasfiscal','0',$dataset->fiscal_warehouse ?? true,
                    ['id' => 'hasfiscal-0', 'class' => 'form-check-input', 'onchange' => 'disable("fiscal_warehouse")']) !!}
                  {!! Form::label('hasfiscal-0', 'No',['class' => 'form-check-label']) !!}
              </div>
              <div class="form-check">
                  {!! Form::radio('hasfiscal','1',$dataset->fiscal_warehouse ?? '',
                    ['id' => 'hasfiscal-1', 'class' => 'form-check-input', 'onchange' => 'disable("fiscal_warehouse")']) !!}
                  {!! Form::label('hasfiscal-1', 'Si',['class' => 'form-check-label']) !!}
              </div>
            </div>
            <div class="col mt-2 mt-xl-0">
              @if(isset($dataset->fiscal_warehouse))
                {!! Form::text('fiscal_warehouse',$dataset->fiscal_warehouse ?? '',['class' =>'form-control']) !!}
              @else
                {!! Form::text('fiscal_warehouse',$dataset->fiscal_warehouse ?? '',['class' =>'form-control','disabled' => '']) !!}
              @endif
            </div>
            @error('fiscal_warehouse')
              <small class="mt-0" style="color:red">{{ $message }}</small>
            @enderror
          </div>  
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <div class="form-group mt-4">
            {!! Form::submit('Guardar',['class' =>'btn btn-primary btn-block']) !!}
          </div>
        </div>
      </div>

    {!! Form::close() !!}
    <!-- end form -->
  </div>
</div>
