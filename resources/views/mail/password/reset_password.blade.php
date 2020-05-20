<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		@media screen and (min-device-width:600px), screen and (min-width:600px) {
			#main {
				font-size: 14px;
				line-height: 1.2em;
				width: 600px;
			}
			/*.hotline {
				font-size: 0.8em;
			}
			.hotline-number {
				font-size: 1.5em;
			}*/
		}
		@media (min-device-width:320px) and (max-device-width:599px), (min-width:320px) and (max-width:599px) {
			#main {
				width: 95vw;
				/*font-size: 0.7em;*/
			}
			.hotline {
				font-size: 0.7em;
			}
			.hotline-number {
				font-size: 0.8em;
			}
		}
	</style>
</head>
<body>
	<!-- mail bg -->
	<table style="text-align: center; width:100%; margin:0 auto; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; background:#f8f9fa" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			<tr>
				<td>
					<!-- mail content -->
					<table id="main" style="text-align: center; margin:0 auto; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
								<td>
									<!-- header -->
									<table style="background:#962d91;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td width="60%">
													<p style="padding: 0; margin: 7px 0 3px 10px; text-align: left;"><a href="https://onestopshop.vn" target="_blank">
														<a href="https://onestopshop.vn" target="_blank">
															<img style="border: none;" class="CToWUd" data-image-whitelisted="" src="https://onestopshop.vn/uploads/photos/shares/logo-w.png" width="100%" alt="" />
														</a></p>
												</td>
												<td width="40%">
													<p style="padding: 0; margin: 5px 10px 5px 0; text-align: right;color: white; text-decoration: none;">
														<span class="hotline" style="margin: 0; padding: 0; font-size: 0.9em;">Hotline</span><br />
														<span style="font-size: 1em; margin: 0; padding: 0;"><a class="hotline-number" style="color: white; text-decoration: none; font-size: 1.2em; font-weight: bold;" href="tel:0837000247">0837.000.247</a></span>
													</p>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							
							<tr>
								<td>
									<!-- body -->
									<table style="background:transparent;" width="100%" cellpadding="0" cellspacing="0" border="0">
										<tbody>
											<tr>
												<td>
													<div style="margin: 0; padding: 20px; text-align: center; color: #666; background: white;">
														<!-- welcome -->
														<p style="">Kính chào {{ $customer->name }},</p>
														
														<p style="">Yêu cầu thay đổi mật khẩu của Quý khách đã được cập nhật.</p>
														
														<p style="">Vui lòng bấm vào <a style="color:#962d91; text-decoration: none;" href="{{ $link }}">đây</a> để thay đổi mật khẩu</p>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div style="margin: 0; padding: 20px; text-align: center; color: #666; background: white; border-bottom: 2px solid #ddd; border-top: 2px solid #ddd;">
														<p style="margin-bottom: 10px; padding-bottom: 10px;">Hoặc<br />
														<br />
														</p>
														
														<p style="text-align: center;">
															<a style="color:white; text-decoration: none; padding: 20px; margin: 10px 0; font-weight: bold; background-color: #962d91;" href="{{ $link }}">Thiết lập lại mật khẩu</a>
														</p>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div style="margin: 0; padding: 20px; text-align: center; color: #666; background: white;">
														<p style=" font-size: 0.7em;">OneStopShop.vn xin chân thành cảm ơn và rất mong sẽ tiếp tục nhận được sự ủng hộ của Quý khách trong tương lai!</p>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>