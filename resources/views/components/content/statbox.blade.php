 <!-- Small boxes (Stat box) -->
 <div class="row">

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
        <div class="inner">
            <h3>{{ $entreprises_count }}</h3>

            <p>Entreprises</p>
        </div>
        <div class="icon">
            <i class="ion ion-business"></i>
        </div>
        <a href="{{ route('entreprises.index') }}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-gray">
        <div class="inner">
            <h3>{{ $contacts_count }}</h3>

            <p>Contacts</p>
        </div>
        <div class="icon">

            <a href="{{ route('contacts.index') }}">
                <i class="ion ion-person"></i>
            </a>

        </div>
        <a href="{{ route('contacts.index') }}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->


<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>44</h3>

            <p>Offres emplois</p>
        </div>
        <div class="icon">
            <i class="ion ion-paper"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>65</h3>

            <p>Candidatures</p>
        </div>
        <div class="icon">
            <i class="ion ion-send"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
</div>
<!-- /.box -->