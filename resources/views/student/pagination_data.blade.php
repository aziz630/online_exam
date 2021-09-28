
			@foreach($allQuestion1 as $key => $questions)
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
			@endforeach

			<br>
			<br>
			<div class="d-flex justify-content-center">
            <!-- {! ! $allQuestion1->render() ! !} -->
			</div>   
			<div class="row">
				<input type="hidden" name="index" value="{{ $key+1 }}">
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-pill add_category">Submit</button>
					<!-- <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Back</button> -->
				</div>
			</div> 
        