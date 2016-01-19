@extends("template.master")
@section("title","Client Add")
@section("css_script")
    <link rel="stylesheet" href="{{ asset("assets/css/chosen.css") }}" />
@endsection
@section("breadcrumbs",Breadcrumbs::render('add_client'))
@section("sidebar_menu")
    @include("menu.pm_menu")
@endsection
@section("content")
    <div class="page-content">
        <div class="page-header">
            <h1>
                Client
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Add Client
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                @if(!$errors->isEmpty())
                <?php
                $data ="";
                $data .= '<ul>';
                foreach($errors->all() as $error)
                {
                    $data .= '<li>'.$error.'</li>';
                }
                $data .='</ul>';
                ?>
                {!! CustomLib::generate_notification($data,"error") !!}
                @endif


                        <!-- PAGE CONTENT BEGINS -->
                {!! Form::model($client,array('url' => 'client/update/'.$client->id_client,'class'=>'form-horizontal','name'=>'add_client','method'=>'PUT')) !!}

                        <!-- #section:elements.form -->
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name (PT) </label>

                    <div class="col-sm-9">
                        {!! Form::text('name_pt', $client->nama_pt,array('class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>'Fullname')); !!}

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PIC </label>

                    <div class="col-sm-9">
                        {!! Form::text('pic',$client->pic,array('class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>'Fullname')); !!}

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone </label>

                    <div class="col-sm-9">
                        {!! Form::number('phone', $client->no_telepon,array('class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>'Phone Number')); !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

                    <div class="col-sm-9">
                        {!! Form::textarea('address', $client->alamat,array('class'=>'col-xs-10 col-sm-5','id'=>'form-field-8','placeholder'=>'Address')); !!}
                    </div>
                </div>
                <hr>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

                    <div class="col-sm-9">
                        {!! Form::email('email', $user->email,array('class'=>'col-xs-10 col-sm-5','id'=>'form-field-1','placeholder'=>'Email','disabled'=>'disabled')); !!}
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Type </label>

                    <div class="col-sm-9">
                        {!! Form::select('type', CustomLib::gen_type(), 'client', ['placeholder' => '--- Type Users ---','id'=>'form-field-select-1','class'=>'col-xs-10 col-sm-5','disabled'=>'disabled']); !!}

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Support </label>

                    <div class="col-sm-9">
                        <table id="support" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Support Name</th>
                                <th><button type="button" id="add_support" class="btn btn-white btn-success" onclick="add_row();">Add</button></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($clientsupport as $item)
                                <tr>
                                    <td>{!! Form::select('support[]', $support,$item->id_support,['class'=>'chosen-select form-control','id'=>'support_name']) !!}</td>
                                    <td><button class="btn btn-sm btn-danger" onclick="delete_row(this);" type="button">Delete</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">

                        <button class="btn btn-info" type="submit" onclick="check(this);">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Clear Form
                        </button>
                    </div>
                </div>


                </form>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section("js_script")
    <script src="{{ asset('assets/js/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        function add_row(){
            $('#support tbody').append('<tr><td>{!! Form::select('support[]', $support,null,['class'=>'chosen-select form-control','id'=>'support_name']) !!}</td><td><button class="btn btn-sm btn-danger" onclick="delete_row(this);" type="button">Delete</button></td></tr>');
            $(".chosen-select").chosen({ width:"95%" });
        }

        function delete_row(id){
            $(id).parent().parent().remove();
        }

        function check(e){

            $('form[name=add_client]').submit(function() {
                var check = $('#support_name').val();

                if(!check){
                    alert("Support must be filled");
                    return false
                }

                return true;
            });
        }

        jQuery(function($) {
            if(!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect:true});
                //resize the chosen on window resize

                $(window)
                        .off('resize.chosen')
                        .on('resize.chosen', function() {
                            $('.chosen-select').each(function() {
                                var $this = $(this);
                                $this.next().css({'width': $this.parent().width()});
                            })
                        }).trigger('resize.chosen');
                //resize chosen on sidebar collapse/expand
                $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                    if(event_name != 'sidebar_collapsed') return;
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                    })
                });

            }
        });


    </script>
@endsection