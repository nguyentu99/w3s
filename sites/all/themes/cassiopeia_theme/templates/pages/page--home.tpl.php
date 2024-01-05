<div class="video-app dark-mode">
	<?php
	print render($page['content']['metatags']);
	?>
	<?php if ($messages): ?>
		<div id="console" class="clearfix"><?php print $messages; ?></div>
	<?php endif; ?>
	<!-- header -->
	<?php include('header.inc'); ?>
	<!-- /.header -->

	<!-- main -->
	<div class="wrapper">
		<div class="left-side">
			<div class="side-wrapper">
				<div class="side-menu">
					<a href="#">
						Home
					</a>
					<a href="#">
						My channel
					</a>
					<a href="#">
						Popular video
					</a>
					<a href="#">
						Subscriptions
					</a>
					<a href="#">
						History views
					</a>
					<a href="#">
						Watch Later
					</a>
					<a href="#">
						Liked Videos
					</a>
					<a href="#">
						Playlists
					</a>
				</div>
			</div>
		</div>
		<div class="main-container">
			<div class="page-content" style="color: #efefef !important;">

				<h1 class="heading-secondary text-center">
					Hướng dẫn thủ tục làm visa Canada diện công tác </h1>
				<div class="mt-6">
					<p>Hướng dẫn thủ tục làm visa Canada diện du lịch Bao gồm</p>
					<p>các thủ tục sau:</p>
					<ol>
						<li>Thông tin cá nhân– Lý lịch trích ngang _ Dùng để khai form xin visa do cty du lịch
							cung cấp– Mẫu đơn do cty du lịch cung cấp– Tờ khai chi tiết về thân nhân được điền
							đầy đủ thông tin– Hộ chiếu còn hiệu lực: Ít nhất 6 tháng tính từ ngày khởi hành, Hộ
							chiếu cũ nếu có– Bản sao trang hộ chiếu có chi tiết cá nhân của đương đơn và tất cả
							các trang đã được sử dụng ( tất cả các trang có đóng dấu hải quan hoặc có dán nhãn
							thị thực)– CMTND (Bản sao công chứng)– Sổ hộ khẩu hiện tại (Bản sao công chứng)– Bản
							gốc Sơ yếu lý lịch không quá 6 tháng, Nêu rõ các chi tiết lien quan đến trình độ học
							vấn và quá tình công tác do chính quyền địa phương hoặc cơ quan xác nhận.– Giấy khai
							sinh (Bản sao công chứng)– Bằng chứng về tình trạng hôn nhân:• Giấy xác nhận độc
							thân / Đăng ký kết hôn / Ly hôn/ Chứng tửBằng chứng về tài sản (Bản sao công chứng)•
							Giấy tờ sở hữu tài sản như nhà đất, xe hơi,…• Giấy chứng nhận thu nhập từ việc cho
							thuê bất động sản, cổ phiếu, cổ phần hay các khoản đầu tư tạo thu nhập khácBằng
							chứng về khả năng tài chính để chi trả cho chuyến đi:• Sao kê ngân hàng gần đây, Sao
							kê thẻ tín dụng cho thấy số dư hiện tại• Sổ tiết kiệm (tối thiểu là 100 triệu)• Sao
							kê tài khoản cá nhân 3 tháng gần nhấtNếu được đài thọ cho chuyến đi, cần cung cấp:•
							Bằng chứng về tài chính (gồm thu nhập) của cá nhân/ tc đó• Tờ tường trình nêu rõ cá
							nhân/ t/c đó mong muốn chi trả cho chi phí chuyến điNếu có ý định đi học trong thời
							gian ba tháng hoặc ít hơn, cung cấp chi tiết khóa học</li>
						<li>Nếu thăm thân nhân/ vợ chồng hoặc bạn bè ở CANADA– Bằng chứng về mối quan hệ của
							đương đơn với người thân ở Canada (Giấy khai sinh của người thân _ Bản sao công
							chứng)– Bằng chứng về hiện trạng cư trú ở Canada (Hộ chiếu Canada của người thân _
							Sao– Thư mời của người dự định đi thăm, xác nhận hình thức hỗ trợ mà người đó sẽ
							cung cấp)</li>
						<li>Chủ Doanh nghiệp– Giấy phép đăng ký kinh doanh (Bản sao công chứng)– Quyết toán thuế
							năm gần nhất (Bản sao công chứng)– Sao kê tài khoản ngân hàng của công ty 3 tháng
							gần nhất</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.main -->
</div>

<style>
	@import url("https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600&display=swap");

	:root {
		--body-font: "Manrope", sans-serif;
		--body-color: #333;
		--body-bg-color: #f2f2f2;
		--theme-bg-color: #fafafa;
		--border-color: #efefef;
		--logo-color: #f13a2f;
		--main-color: #333;
		--header-bg-color: #fff;
	}

	.dark-mode {
		--body-bg-color: #1e222b;
		--theme-bg-color: #212835;
		--border-color: #393f50;
		--header-bg-color: #323a4b;
		--main-color: #fefffd;
		--body-color: #dddee0;
	}

	* {
		outline: none;
		box-sizing: border-box;
	}

	img {
		max-width: 100%;
	}

	html {
		box-sizing: border-box;
		-webkit-font-smoothing: antialiased;
	}

	body {
		font-family: var(--body-font);
		font-size: 15px;
		color: var(--body-color);
		background-color: var(--body-bg-color);
		margin: 0;
		font-weight: 600;
		min-height: -webkit-fill-available;
	}

	.video-app {
		display: flex;
		flex-direction: column;
		height: 100vh;
		margin: 0 auto;
		overflow: hidden;
	}

	.header {
		height: 90px;
		width: 100%;
		border-bottom: 1px solid var(--border-color);
		display: flex;
		background-color: var(--header-bg-color);
		align-items: center;
		padding: 0 25px;
		color: var(--body-color);
		font-size: 15px;
	}

	.header-left {
		display: flex;
		align-items: center;

	svg {
		width: 22px;
		margin-right: 25px;
		flex-shrink: 0;
	}
	}

	.logo {
		width: 34px;
		height: 34px;
		border: 5px solid var(--logo-color);
		border-radius: 50%;
		flex-shrink: 0;
	}

	.header-menu {
		display: flex;
		align-items: center;
		cursor: pointer;
		margin-left: auto;
		padding: 0 15px;
		margin: 0;
	}

	.menu-item {
	&:hover {
		 color: var(--logo-color);
	 }

	&:not(:last-child) {
		 margin-right: 20px;
	 }
	}

	.user-settings {
		display: flex;
		align-items: center;
		margin-left: auto;
		flex-shrink: 0;

	&>*+* {
		 margin-left: 18px;
	 }
	}

	.user-settings svg {
		width: 22px;
		flex-shrink: 0;
	}

	.button {
		display: flex;
		background-color: transparent;
		align-items: center;
		border: 2px solid var(--border-color);
		border-radius: 25px;
		color: var(--body-color);
		padding: 8px 16px;
		font-family: var(--body-font);
		cursor: pointer;
		font-weight: 600;
		font-size: 14px;

	svg {
		margin-right: 8px;
		width: 20px;
		fill: var(--body-color);
	}
	}

	.search-bar {
		height: 90px;
		position: relative;

	input {
		height: 100%;
		width: 100%;
		display: block;
		background-color: transparent;
		border: none;
		padding: 0 10px 0 54px;
		background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg width='18' height='18' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3e%3cdefs%3e%3cpath d='M18.5 17h-.79l-.28-.27a6.5 6.5 0 10-.7.7l.27.28v.79l5 4.99L23.49 22l-4.99-5zm-6 0a4.5 4.5 0 11-.01-8.99A4.5 4.5 0 0112.5 17z' id='a'/%3e%3c/defs%3e%3cg transform='translate(-6 -6)' fill='none' fill-rule='evenodd'%3e%3cmask id='b' fill='%23fff'%3e%3cuse xlink:href='%23a'/%3e%3c/mask%3e%3cg mask='url(%23b)' fill='%23D8D8D8'%3e%3cpath d='M3 3h24v24H3z'/%3e%3c/g%3e%3c/g%3e%3c/svg%3e");
		background-repeat: no-repeat;
		background-size: 16px;
		background-position: 25px 50%;
		color: #7c7c7c;

	&::placeholder {
		 color: var(--body-color);
	 }
	}
	}

	.user-profile {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		object-fit: cover;

	+svg {
		width: 14px;
	}
	}

	.notify {
		position: relative;

	&:before {
		 content: "";
		 position: absolute;
		 background-color: var(--logo-color);
		 width: 5px;
		 height: 5px;
		 border-radius: 50%;
		 right: -6px;
		 bottom: 15px;
	 }
	}

	.menu-item.active {
		color: var(--logo-color);
	}

	.wrapper {
		width: 100%;
		display: flex;
		flex-grow: 1;
		overflow: auto;
		background-color: var(--theme-bg-color);
	}

	.side-wrapper:not(:last-child) {
		border-bottom: 1px solid var(--border-color);
	}

	.side-wrapper svg {
		width: 20px;
		fill: var(--body-color);
		margin-right: 25px;
		flex-shrink: 0;
	}

	.username {
		color: var(--main-color);
		font-size: 15px;
	}

	.side-menu a {
		text-decoration: none;
		font-weight: 500;
		color: var(--main-color);
		display: flex;
		align-items: center;
		font-size: 15px;
		white-space: nowrap;

	&:not(:last-child) {
		 padding-bottom: 10px;
		 border-bottom: 1px solid var(--border-color);
	 }

	&:not(:first-child) {
		 padding-top: 10px;
	 }
	}

	.side-menu {
		padding: 20px;
	}

	.side-title {
		padding: 0 0 20px;
		font-size: 15px;
	}

	.user {
		display: flex;
		align-items: center;
	}

	.user+.user {
		margin-top: 15px;
	}

	.user-img {
		border-radius: 50%;
		width: 30px;
		height: 30px;
		margin-right: 16px;
		object-fit: cover;
		object-position: center;
	}

	.show-more {
		margin-top: 20px;
		padding: 12px 16px;
	}

	.left-side {
		width: 270px;
		display: flex;
		flex-direction: column;
		border-right: 1px solid var(--border-color);
		overflow: auto;
		flex-shrink: 0;
	}

	.main-container {
		padding: 25px;
		flex-grow: 1;
		overflow: auto;
	}

	.profile {
		height: 45vh;
		max-height: 350px;
		min-height: 270px;
		position: relative;
		display: flex;
		justify-content: flex-end;
		flex-direction: column;
	}

	.profile-cover {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
		border-radius: 4px 4px 6px 6px;
	}

	.profile-menu {
		display: flex;
		justify-content: space-between;
		align-items: center;
		background-color: var(--header-bg-color);
		width: 100%;
		box-shadow: -1px 3px 8px -1px rgba(0, 0, 0, 0.1);
		border-radius: 0 0 4px 4px;
		padding: 0 25px;
		z-index: 2;
	}

	.profile-img {
		border-radius: 50%;
		width: 42px;
		height: 42px;
		object-fit: cover;
		margin-right: 15px;
	}

	.profile-avatar {
		display: flex;
		align-items: center;
		flex-shrink: 0;
	}

	.profile-name {
		white-space: nowrap;
	}

	.menu-items {
		display: flex;
		cursor: pointer;
	}

	.profile-menu-link {
		padding: 20px;
		transition: 0.2s;

	&.active,
	&:hover {
		 border-bottom: 3px solid var(--logo-color);
		 color: var(--logo-color);
	 }
	}

	.profile-info {
		justify-content: center;
		display: flex;
		background-color: rgba(0, 0, 0, 0.3);
		width: 100%;
		z-index: 2;
	}

	.profile-name {
		color: var(--main-color);
	}

	.profile-item {
		display: flex;
		align-items: center;
		color: #fff;
		padding: 26px 16px;
		white-space: nowrap;

	svg {
		width: 22px;
		margin-right: 10px;
	}
	}

	.profile-contact-info {
		position: absolute;
		display: flex;
		right: 10px;
		top: 20px;
		color: #fff;

	svg {
		width: 18px;
	}
	}

	.profile-contact {
		border: 1px solid rgba(239, 239, 239, 0.3);
		padding: 16px;
		margin-left: 10px;
		border-radius: 50%;
		cursor: pointer;
	}

	.follow-buttons {
		display: flex;
	}

	.follow {
		border: 2px solid var(--border-color);
		border-radius: 25px 0 0 25px;
		color: var(--body-color);
		padding: 8px 16px;
		font-weight: 600;
		font-size: 14px;
		cursor: pointer;
		background-color: transparent;

	&:hover {
		 background-color: var(--header-bg-color);
	 }
	}

	.follow-option {
		border-radius: 0 25px 25px 0;
		margin-left: -2px;
	}

	.trends {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 40px 45px;

	a {
		text-decoration: none;
		color: var(--body-color);
		display: flex;
		align-items: center;
		font-size: 15px;
		white-space: nowrap;
	}
	}

	.trends svg {
		width: 20px;
		margin-right: 16px;
	}

	.follow-option.active {
		background-color: var(--header-bg-color);
		margin-left: -3px;
	}

	.play-all {
		background-color: var(--logo-color);
		color: #fff;
		padding: 10px 20px;
		border-radius: 30px;
		display: flex;
		align-items: center;

	svg {
		width: 12px;
		flex-shrink: 0;
		margin-right: 8px;
	}
	}

	.videos {
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		grid-column-gap: 20px;
		grid-row-gap: 20px;
	}


	.video video {
		transition: .4s;
		max-width: 100%;
		display: block;
		border-radius: 4px 4px 0 0;
	}

	.video {
		overflow: hidden;
		box-shadow: -1px 3px 8px -1px rgba(0, 0, 0, 0.1);
		border-radius: 4px;
		position: relative;
		background-color: var(--header-bg-color);
		cursor: pointer;

	&:hover .video-time {
		 opacity: 0;
	 }

	&:hover video {
		 transform: scale(2.2);
		 transform-origin: center;
	 }

	&:hover .view {
		 padding: 10px;
	 }
	}

	.video-time {
		position: absolute;
		background-color: rgba(0, 0, 0, 0.5);
		padding: 8px;
		border-radius: 15px;
		font-size: 12px;
		color: #fff;
		bottom: 80px;
		right: 6px;
		transition: .3s ease-in;
	}


	.video-content {
		width: 100%;
		color: var(--main-color);
		padding: 15px 10px 0;
		border-radius: 0 0 4px 4px;
		font-size: 14px;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.view {
		padding: 10px;
		position: relative;
		background-color: var(--header-bg-color);
		z-index: 1;
		font-size: 13px;
	}

	.load-more {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 30px;
		border-bottom: 1px solid var(--border-color);
		cursor: pointer;

	svg {
		width: 16px;
		margin-right: 15px;
	}

	&:hover svg {
		 animation: load 0.9s linear infinite;
	 }
	}

	@keyframes load {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}

	.language {
		margin-bottom: 8px;
	}

	.footer-row {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.footer-links a {
		text-decoration: none;
		color: var(--main-color);

	&+a {
		 margin-left: 8px;
	 }
	}

	.footer-links {
		display: flex;
	}

	.link-footer a {
		color: var(--body-color);
		font-size: 14px;
	}

	.footer {
		padding: 30px 0;

	&-last {
		 border-top: 1px solid var(--border-color);
		 padding: 30px 0;
		 display: flex;
		 align-items: center;
		 justify-content: space-between;
	 }
	}

	.social-media {
		display: flex;
		align-items: center;

	svg {
		width: 100%;
	}

	a {
		border: 1px solid var(--border-color);
		border-radius: 50%;
		color: var(--body-color);
		padding: 8px;
		flex-shrink: 0;
		width: 36px;
		height: 36px;
		margin-right: 12px;
	}
	}

	.policy a {
		text-decoration: none;
		color: var(--body-color);
	}

	@media (max-width:1030px) {
		.profile-name {
			display: none;
		}

		.profile-menu-link {
			padding: 20px 10px;
			font-size: 14px;
		}

		.trends {
			padding: 40px 10px;
		}
	}

	@media (max-width: 1120px) {
		.footer-row {
			flex-direction: column;

	&+& {
		 margin-top: 10px;
	 }

		.button {
			display: none;
		}
	}
	}

	@media (max-width:900px) {
		.play-all {
			color: transparent;
			white-space: nowrap;
			width: 30px;
			padding: 0;
			fill: #fff;
			height: 30px;
			position: relative;
		}

		.profile-item {
			padding: 20px 10px;
		}

		.play-all svg {
			position: absolute;
			left: 58%;
			top: 50%;
			transform: translate(-50%, -50%);
			fill: #fff;
		}
	}

	@media (max-width: 840px) {
		.profile-contact {
			padding: 6px;
		}

		.profile-item,
		.profile-avatar {
			flex-direction: column;
		}

		.profile-item svg {
			margin-right: 0;
		}

		.profile-item {
			text-align: center;
		}

		.profile-img {
			margin-right: 0;
			margin-top: 10px;
		}

		.profile-name {
			display: block;
			margin-bottom: 10px;
			margin-top: 6px;
		}

		.profile-menu {
			flex-direction: column;
		}

		.menu-items {
			order: 1;
		}
	}


	@media (max-width: 980px) {
		.videos {
			grid-template-columns: 1fr 1fr;
		}

		.profile {
			min-height: 380px;
			max-height: 380px;
		}
	}

	@media (max-width: 800px) {
		.trends .follow-buttons {
			display: none;
		}
	}

	@media (max-width: 750px) {
		.left-side {
			display: none;
		}

		.header-menu {
			display: none;
		}

		.search-bar input {
			max-width: 140px;
		}

		.user-settings button {
			width: 40px;
			height: 40px;
			border-radius: 50%;
			padding: 0;
			position: relative;
			color: transparent;
		}

		.user-settings button svg {
			margin-right: 0;
			position: absolute;
			display: block;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
	}

	@media (max-width: 440px) {
		.user-settings svg {
			display: none;
		}

		.videos {
			grid-template-columns: 1fr;
		}
	}

	@media (max-width: 475px) {
		.footer-links {
			flex-direction: column;
		}

		.footer-links a+a {
			margin-left: 0;
		}

		.footer-row:last-child {
			align-items: flex-end;
		}

		.footer-row {
			align-items: flex-start;
		}

		.footer {
			display: flex;
			justify-content: space-between;
		}

		.footer-links a {
			margin-bottom: 5px;
		}

		.policy {
			display: none;
		}
	}
</style>
