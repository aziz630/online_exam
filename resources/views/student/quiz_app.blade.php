<!--begin::Wizard-->
<div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
    <!--begin::Wizard Nav-->
    <div class="wizard-nav border-bottom">
        

                @php 
                    $counter = 0;
                @endphp
                @foreach($allQuestion1 as $questions)
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-step" data-wizard-type="step" {{ ($counter == 0) ? "data-wizard-state=current" : '' }} ></div>
                    <!--end::Wizard Step 1 Nav-->
                    @php $counter++ @endphp
                @endforeach
    </div>
    <!--end::Wizard Nav-->
    <!--begin::Wizard Body-->
    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-7">
            <!--begin::Wizard Form-->
            <form action="{{ url('submit/student/question') }}" class="form" id="kt_form"  method="post">
                @csrf
                <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                @php $counter = 0; @endphp
                @foreach($allQuestion1 as $key => $questions)
                <!--begin::Wizard Step 1-->
                <div class="pb-5" data-wizard-type="step-content" {{ ($counter == 0) ? "data-wizard-state=current" : '' }} >
                    <div class="row">
                        <div class="col-md-12">
                            <p><b>{{ $key+1 }}  :  {{ $questions['questions'] }}</b></p>
                            <br>
                            <?php
                                $options = json_decode(json_encode(json_decode($questions['options'])), true);
                            ?>
                            <input type="hidden" name="question{{ $key+1 }}" value="{{ $questions['id'] }}">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="radio-inline">
                                    <label class="radio radio-outline radio-outline-2x radio-primary">
                                        <input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option1'] }}" />
                                        <span></span>{{ $options['option1'] }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                        <input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option2'] }}"/>
                                        <span></span>{{ $options['option2'] }}
                                        </label>    
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option3'] }}"/>
                                            <span></span>{{ $options['option3'] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option4'] }}"/>
                                            <span></span>{{ $options['option4'] }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: none;">
                                    <div class="radio-inline">
                                        <label class="radio radio-outline radio-outline-2x radio-primary">
                                            <input type="radio" name="ans{{ $key+1 }}" value="0" checked="checked" />
                                            <span></span>{{ $options['option4'] }}
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  
                    
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordion{{ $key+1 }}">
                                    <div class="card">
                                    <div class="card-header" id="heading{{ $key+1 }}">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapse{{ $key+1 }}">
                                            <i class="flaticon-eye"></i>View Answer</div>
                                        </div>
                                        <div id="collapse{{ $key+1 }}" class="collapse" data-parent="#accordion{{ $key+1 }}">
                                            <div class="card-body"><b> Right Answer is :</b> {{ $questions['ans'] }}</div>
                                            <div class="card-body"><b> Explination :</b> {{ $questions['description'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Accordion-->
                                <!--begin::Code example-->
                                <div class="example example-compact mt-5">
                                
                                    <div class="example-code">
                                        <div class="example-highlight">
                                            <pre style="height:300px">
                                            <code class="language-html">
                                            &lt;div class="accordion accordion-solid accordion-toggle-plus" id="accordion{{ $key+1 }}"&gt;
                                                &lt;div class="card"&gt;
                                                    &lt;div class="card-header" id="heading{{ $key+1 }}"&gt;
                                                        &lt;div class="card-title collapsed" data-toggle="collapse" data-target="#collapse{{ $key+1 }}"&gt;
                                                            Latest Payroll
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                    &lt;div id="collapse{{ $key+1 }}" class="collapse" data-parent="#accordion{{ $key+1 }}"&gt;
                                                        &lt;div class="card-body"&gt;
                                                            ...
                                                        &lt;/div&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                            </code>
                                            </pre>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Code example-->
                            </div>
                        </div>
                    </div>	
                    <br>
                    <br>
                </div>
                <!--end::Wizard Step 1-->
                @php $counter++; @endphp
                @endforeach
                <!--begin::Wizard Actions-->
                <div class="d-flex justify-content-between border-top ">
                    <div class="mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" onclick="button2()" data-wizard-type="action-prev">Previous</button>
                    </div>
                    <div>
                    <input type="hidden" name="index" value="{{ $key+1 }}">
                        <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" onclick="button1()" data-wizard-type="action-next">Next</button>
                    </div>
                </div>
                <!--end::Wizard Actions-->
            </form>
            <!--end::Wizard Form-->
        </div>
    </div>
    <!--end::Wizard Body-->
</div>
<!--end::Wizard-->