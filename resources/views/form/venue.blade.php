<div class="col-md-12">
    <h1 class="text-center bold">ACCREDITATION</h1>
    <h2 class="text-center">VENUE OPERATIONS</h2>
    <br>
</div>

<div class="col-md-12">
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
{!! Form::open(['url'=>handles('blupl/venue::member/registration'), 'files'=>true]) !!}
{!! Form::hidden('user_id', Auth::user()->id) !!}

<fieldset>
    
        <div class="col-md-6 form-group">
            {!! Form::label('name', 'NAME') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('gender', 'GENDER') !!}
            {!! Form::select('gender', [''=>'Choose From List', 'male'=>'Male', 'female'=>'Female', 'other'=>'Other'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('personal_id', 'PASSPORT OR NID NUMBER') !!}
            {!! Form::text('personal_id', null,['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('department', 'REPORTING DEPARTMENT AT BCB') !!}
            {!! Form::select('department', [
            ''=>'Choose From List',
            'adminhr'=>'Admin &amp; HR',
            'age-group'=>'Age Group Tournament',
            'anti-corruption'=>'Anti-Corruption',
            'board-affairs'=>'Board Affairs',
            'bpl-council'=>'BPL Governing Council',
            'ccdm'=>'CCDM',
            'cricket-operations'=>'Cricket Operations',
            'disciplinary'=>'Disciplinary',
            'venue'=>'Facilities Management',
            'finance'=>'Finance',
            'development'=>'Game Development',
            'grounds'=>'Grounds',
            'performance'=>'High Performance',
            'Logistics'=>'Logistics and Protocol',
            'marketing'=>'Marketing and Commercial',
            'media'=>'Media and Communications',
            'Medical'=>'Medical',
            'security'=>'Security',
            'tender'=>'Tender and Purchase',
            'tournament'=>'Tournament',
            'umpires'=>'Umpires',
            'venue'=>'Venue Administration',
            'women'=>'Women&rsquo;s Wing'],
            null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('mobile', 'CONTACT MOBILE NUMBER') !!}
            {!! Form::text('mobile', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('email', 'CONTACT E-MAIL ID') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('date_of_birth', 'DATE OF BIRTH') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('date_of_birth', null, ['class'=>'form-control', 'data-inputmask'=>"'alias': 'dd/mm/yyyy'",  'data-mask']) !!}
            </div>
        </div>

        <div class="col-md-8">
            {!! Form::label('function', 'FUNCTION') !!}
            {!! Form::select('function', [
                ''=>'Choose From List',
                'male'=>'Venue Operations Staff',
                'female'=>'Ground Staff',
                'scorer'=>'Scorer',
                'other'=>'PA Anouncer',
                'dj'=>'DJ'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('present_address', 'PRESENT RESIDENT ADDRESS') !!}
            {!! Form::text('present_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            {!! Form::text('present_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            <div class="col-md-6 form-group no-padding">
                {!! Form::select('present_district', [
                ''=>'Choose From List',
                'barguna'=>'Barguna',
                'bhola'=>'Bhola',
                'bogra'=>'Bogra',
                'jhalokati'=>'Jhalokati',
                'patuakhali'=>'Patuakhali',
                'pirojpur'=>'Pirojpur',
                'bandarban'=>'Bandarban',
                'brahmanbaria'=>'Brahmanbaria',
                'chandpur'=>'Chandpur',
                'chittagong'=>'Chittagong',
                'comilla'=>'Comilla',
                'cox-bazar'=>'Cox&rsquo;s Bazar',
                'feni'=>'Feni',
                'khagrachhari'=>'Khagrachhari',
                'lakshmipur'=>'Lakshmipur',
                'noakhali'=>'Noakhali',
                'rangamati'=>'Rangamati',
                'dhaka'=>'Dhaka',
                'faridpur'=>'Faridpur',
                'gazipur'=>'Gazipur',
                'gopalganj'=>'Gopalganj',
                'kishoreganj'=>'Kishoreganj',
                'madaripur'=>'Madaripur',
                'manikganj'=>'Manikganj',
                'munshiganj'=>'Munshiganj',
                'narayanganj'=>'Narayanganj',
                'narsingdi'=>'Narsingdi',
                'rajbari'=>'Rajbari',
                'shariatpur'=>'Shariatpur',
                'tangail'=>'Tangail',
                'bagerhat'=>'Bagerhat',
                'chuadanga'=>'Chuadanga',
                'jessore'=>'Jessore',
                'jhenaidah'=>'Jhenaidah',
                'khulna'=>'Khulna',
                'kushtia'=>'Kushtia',
                'magura'=>'Magura',
                'meherpur'=>'Meherpur',
                'narail'=>'Narail',
                'satkhira'=>'Satkhira',
                'jamalpur'=>'Jamalpur',
                'mymensingh'=>'Mymensingh',
                'netrakona'=>'Netrakona',
                'sherpur'=>'Sherpur',
                'joypurhat'=>'Joypurhat',
                'naogaon'=>'Naogaon',
                'natore'=>'Natore',
                'chapainawabganj'=>'Chapainawabganj',
                'pabna'=>'Pabna',
                'rajshahi'=>'Rajshahi',
                'sirajganj'=>'Sirajganj',
                'dinajpur'=>'Dinajpur',
                'gaibandha'=>'Gaibandha',
                'kurigram'=>'Kurigram',
                'lalmonirhat'=>'Lalmonirhat',
                'nilphamari'=>'Nilphamari',
                'panchagarh'=>'Panchagarh',
                'rangpur'=>'Rangpur',
                'thakurgaon'=>'Thakurgaon',
                'habiganj'=>'Habiganj',
                'moulvibazar'=>'Moulvibazar',
                'sunamganj'=>'Sunamganj',
                'sylhet'=>'Sylhet'
                ], 'dhaka', ['class'=>'form-control select2', 'placeholder'=>'District-Choose from list', 'style'=>'width: 100%;']) !!}
            </div>
            <div class="col-md-6 form-group no-padding">
                {!! Form::text('present_zip', null, ['class'=>'form-control', 'placeholder'=>'Post Code']) !!}
            </div>
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('permanent_address', 'PERMANENT RESIDENT ADDRESS') !!}
            {!! Form::text('permanent_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            {!! Form::text('permanent_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            <div class="col-md-6 form-group no-padding">
                {!! Form::select('permanent_district', [
                'barguna'=>'Barguna',
                'bhola'=>'Bhola',
                'bogra'=>'Bogra',
                'jhalokati'=>'Jhalokati',
                'patuakhali'=>'Patuakhali',
                'pirojpur'=>'Pirojpur',
                'bandarban'=>'Bandarban',
                'brahmanbaria'=>'Brahmanbaria',
                'chandpur'=>'Chandpur',
                'chittagong'=>'Chittagong',
                'comilla'=>'Comilla',
                'cox-bazar'=>'Cox&rsquo;s Bazar',
                'feni'=>'Feni',
                'khagrachhari'=>'Khagrachhari',
                'lakshmipur'=>'Lakshmipur',
                'noakhali'=>'Noakhali',
                'rangamati'=>'Rangamati',
                'dhaka'=>'Dhaka',
                'faridpur'=>'Faridpur',
                'gazipur'=>'Gazipur',
                'gopalganj'=>'Gopalganj',
                'kishoreganj'=>'Kishoreganj',
                'madaripur'=>'Madaripur',
                'manikganj'=>'Manikganj',
                'munshiganj'=>'Munshiganj',
                'narayanganj'=>'Narayanganj',
                'narsingdi'=>'Narsingdi',
                'rajbari'=>'Rajbari',
                'shariatpur'=>'Shariatpur',
                'tangail'=>'Tangail',
                'bagerhat'=>'Bagerhat',
                'chuadanga'=>'Chuadanga',
                'jessore'=>'Jessore',
                'jhenaidah'=>'Jhenaidah',
                'khulna'=>'Khulna',
                'kushtia'=>'Kushtia',
                'magura'=>'Magura',
                'meherpur'=>'Meherpur',
                'narail'=>'Narail',
                'satkhira'=>'Satkhira',
                'jamalpur'=>'Jamalpur',
                'mymensingh'=>'Mymensingh',
                'netrakona'=>'Netrakona',
                'sherpur'=>'Sherpur',
                'joypurhat'=>'Joypurhat',
                'naogaon'=>'Naogaon',
                'natore'=>'Natore',
                'chapainawabganj'=>'Chapainawabganj',
                'pabna'=>'Pabna',
                'rajshahi'=>'Rajshahi',
                'sirajganj'=>'Sirajganj',
                'dinajpur'=>'Dinajpur',
                'gaibandha'=>'Gaibandha',
                'kurigram'=>'Kurigram',
                'lalmonirhat'=>'Lalmonirhat',
                'nilphamari'=>'Nilphamari',
                'panchagarh'=>'Panchagarh',
                'rangpur'=>'Rangpur',
                'thakurgaon'=>'Thakurgaon',
                'habiganj'=>'Habiganj',
                'moulvibazar'=>'Moulvibazar',
                'sunamganj'=>'Sunamganj',
                'sylhet'=>'Sylhet'
                ], 'dhaka', ['class'=>'form-control select2', 'placeholder'=>'District-Choose from list', 'style'=>'width: 100%;']) !!}
            </div>
            <div class="col-md-6 form-group no-padding">
                {!! Form::text('permanent_zip', null, ['class'=>'form-control', 'placeholder'=>'Post Code']) !!}
            </div>
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('attachment', 'SCAN COPY OF PASSPORT BIO-PAGE OR BOTH SIDES OF NID') !!}
            {!! Form::file('file2', ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('photo', 'UPLOAD RECENTLY TAKEN PORTRAIT PHOTO') !!}
            {!! Form::file('file1', ['class'=>'form-control']) !!}
        </div>
</fieldset>

    <fieldset>
        <div class="divider"></div>
            <div class="col-md-12">
                {!! Form::submit('Submit', ['class'=>'btn-success']) !!}
            </div>
    </fieldset>
    {!! Form::close() !!}

</div>