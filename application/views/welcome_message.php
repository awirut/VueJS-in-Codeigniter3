<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VUE JS</title>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>


<div id="root">
	<div class="container">
		<h1 class="fleft">รายการ</h1>
		<button class="fright addNew" @click="showingAddModal = true;">เพิ่มผู้ใช้งาน</button>
		<div class="clear"></div>
		<hr>
		<p class="errorMessage" v-if="errorMessage">
			{{errorMessage}}
		</p>

		<p class="successMessage" v-if="successMessage">
			{{successMessage}}
		</p>

		<table class="list">
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<tr v-for="user in users">
				<td>{{user.id}}</td>
				<td>{{user.username}}</td>
				<td>{{user.email}}</td>
				<td>{{user.mobile}}</td>
				<td><button @click="showingEditModal = true; selectUser(user)">แก้ไข</button></td>
				<td><button @click="showingDeleteModal = true; selectUser(user)">ลบ</button></td>
			</tr>
		</table>

	</div>


	<div class="modal" id="addModal" v-if="showingAddModal">
		<div class="modalContainer">
			<div class="modalHeading">
				<p class="fleft">เพิ่มผู้ใช้งาน</p>
				<button class="fright close" @click="showingAddModal = false;">x</button>
				<div class="clear"></div>
			</div>
			<div class="modalContent">
				<table class="form">
					<tr>
						<th>รหัสผาน</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="newUser.username"> </td>
					</tr>

					<tr>
						<th>อีเมล์</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="newUser.email"> </td>
					</tr>

					<tr>
						<th>โทรศัพท์</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="newUser.mobile"> </td>
					</tr>

					<tr>
						<th></th>
						<th> </th>
						<td> <button @click="showingAddModal = false; saveUser();">Save</button> </td>
					</tr>


				</table>
			</div>
		</div>
	</div>

	<div class="modal" id="editModal" v-if="showingEditModal">
		<div class="modalContainer">
			<div class="modalHeading">
				<p class="fleft">แก้ไขข้อมูลผู้ใช้</p>
				<button class="fright close" @click="showingEditModal = false;">x</button>
				<div class="clear"></div>
			</div>
			<div class="modalContent">
				<table class="form">
					<tr>
						<th>Username</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="clickedUser.username"> </td>
					</tr>

					<tr>
						<th>Email</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="clickedUser.email"> </td>
					</tr>

					<tr>
						<th>Mobile</th>
						<th> : </th>
						<td> <input type="text" name="" v-model="clickedUser.mobile"> </td>
					</tr>

					<tr>
						<th></th>
						<th> </th>
						<td> <button @click="showingEditModal = false; updateUser()">Update</button> </td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="modal" id="deleteModal" v-if="showingDeleteModal">
		<div class="modalContainer">
			<div class="modalHeading">
				<p class="fleft">ยืนยันการลบ?</p>
				<button class="fright close" @click="showingDeleteModal = false;">x</button>
				<div class="clear"></div>
			</div>
			<div class="modalContent">
				<p>คุณแน่ใจที่จะลบข้อมูลนี้ '{{clickedUser.username}}'.</p>
				<br><br><br><br><br>
				<button @click="showingDeleteModal = false; deleteUser()">Yes</button>
				<button @click="showingDeleteModal = false;">No</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url();?>assets/vue/axios.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vue/vue.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vue/app.js" type="text/javascript"></script>
</body>
</html>