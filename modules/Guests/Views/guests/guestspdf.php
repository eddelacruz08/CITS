
						<html>
											<body>
											<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
											    <img src="http://localhost/HDS/public/img/PUPLogo.png"
											         style="width: 100px; height: 100px; margin-top: 75; margin-left: 60;" />
											</div>
											<br>
												<table>
													<thead>
														<tr>
															<td style="font-size: 20px; margin-top: 5px; margin-bottom: 0;" width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="90%"><p>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</p></td>
														</tr>
														<tr>
															<td width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>TAGUIG BRANCH</p></td>
														</tr>
														<tr>
															<td width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>MEDICAL SERVICES DEPARTMENT</p></td>
														</tr>
													</thead>
												</table>
												<h3 align="center">HEALTH DECLARATION REPORT</h3>
												<hr>



												<table>
													<tbody align="center">
														<tr>
																<th style="width: 70px; border: 0px solid black;">ID</th>
																<th style="width: 157px; border: 0px solid black;">Fullname</th>
																<th style="width: 148px; border: 0px solid black;">Guest Category</th>
																<th style="width: 145px; border: 0px solid black;">Gender</th>
																<th style="width: 155px; border: 0px solid black;">Contact Number</th>
														</tr>
													</tbody>
												</table>
                        <?php
											$cnt = 1;
											foreach($guests_pdf as $guest){

												if($guest['user_type'] == 's'){
													$user_type = 'Student';
												}
												elseif($guest['user_type'] == 'f'){
													$user_type = 'Faculty';
												}
												elseif($guest['user_type'] == 'e'){
													$user_type = 'Employee';
												}
												elseif($guest['user_type'] == 'o'){
													$user_type = 'Outsider';
												}else{
													$user_type = 'Nothing';
												}
												$id = $guest['id'];
												$created_at = $guest['created_at'];
												$full_name = $guest['full_name'];
												$email = $guest['email'];
												$email = $guest['email'];
												$gender = $guest['gender'] == 'm' ? 'Male': 'Female';
												$cellphone_no = $guest['cellphone_no'];
                      }
                        ?>

									<table>
										<tbody>
											<tr>
												<td align="center" style="width: 70px; border: 0px solid dark;"><?=$cnt++?></td>
												<td align="center" style="width: 157px; border: 0px solid dark;"><?=ucwords($full_name)?></td>
												<td align="center" style="width: 148px; border: 0px solid dark;"><?=$user_type?></td>
												<td align="center" style="width: 145px; border: 0px solid dark;"><?=ucfirst($gender)?></td>
												<td align="center" style="width: 155px; border: 0px solid dark;"><?=ucwords($cellphone_no)?></td>
											</tr>
											</tbody>
										</table>
					 <hr>	</body>
					 </html>
