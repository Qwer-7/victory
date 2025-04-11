<?php /*a:2:{s:73:"/www/wwwroot/11.fanlipt.com/app/admin/controller/Sys/view/menu/admin.html";i:1645077838;s:64:"/www/wwwroot/11.fanlipt.com/app/admin/view/common/container.html";i:1643093912;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/element/index.css" rel="stylesheet">
<link href="/assets/css/base.css" rel="stylesheet">
<script src="/assets/element/vue.js"></script>
<script src="/assets/element/index.js"></script>
<script src="/assets/js/axios.min.js"></script>
<script src="/components/base.component.js"></script>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="/assets/js/js.cookie.min.js"></script>
<script src="/assets/js/common.js"></script>
<script type="text/javascript">
Vue.config.productionTip = false
<?php
$dialogstate = request()->get('dialogstate');
?>
const base_url = '<?php echo getBaseUrl()?>';
const base_dir = '';//勿要删除
</script>
</head>


<body>
<header id="page-topbar" style="position:fixed;left:0; top:0; z-index:999;<?php if($dialogstate == 1): ?>display:none;<?php endif; ?>" v-cloak>
	<div class="navbar-header">
		<div class="d-flex">
			<div class="navbar-header">
				<div class="d-flex" data-toggle="cospan">
					<i style="margin-left:15px;" id="vertical-menu-btn" class="el-icon-s-fold"></i>
					<i style="margin-left:15px;" @click="reload" class="el-icon-refresh hidden-sm-and-down"></i>
				</div>
				<div class="d-flex hidden-sm-and-down">
					<el-breadcrumb separator="/" style="margin-left:30px;">
						<el-breadcrumb-item v-for="item in levelList" :key="item.path">
							<a v-if="item.title == '首页'" :href="item.path">{{item.title}}</a>
							<span v-else>{{item.title}}</span>
						</el-breadcrumb-item>
					</el-breadcrumb>
				</div>
			</div>
		</div>
		<div class="d-flex">
			<div class="iconbutton">
				<el-tooltip content="清除缓存" effect="dark" placement="bottom">
					<i @click="clearCache()" class="icontool el-icon-delete"></i>
				</el-tooltip>
			</div>
			<?php if(config('my.show_notice',true)): ?>
			<div class="iconbutton hidden-sm-and-down">
				<el-badge :value="3" is-dot>
				  <el-dropdown placement="bottom-start"  @click.native="getNotice" trigger="click">
					<i class="icontool el-icon-bell" style="font-size:140%"></i>
					<el-dropdown-menu slot="dropdown">
						<div style="width:250px; height:200px; padding:10px 0; text-indent:10px;">
						  <ul>
							<li v-for="item in notice">
							<a :href="item.url">
							<svg style="width: 1.2em;height: 1.2em;vertical-align: -0.25em;fill: currentColor;overflow: hidden;" id="el-icon-alidaichuli" viewBox="0 0 1024 1024"><path d="M704.2048 935.8848H246.7328c-73.5232 0-133.12-59.5968-133.12-133.12V217.4976c0-73.5232 59.5968-133.12 133.12-133.12h457.472c73.5232 0 133.12 59.5968 133.12 133.12v585.2672c0 73.5232-59.5968 133.12-133.12 133.12z" fill="#FFAC3E"></path><path d="M639.4368 326.0416H314.368c-22.6304 0-40.96-18.3296-40.96-40.96s18.3296-40.96 40.96-40.96h325.12c22.6304 0 40.96 18.3296 40.96 40.96s-18.3808 40.96-41.0112 40.96zM639.4368 488.448H314.368c-22.6304 0-40.96-18.3296-40.96-40.96s18.3296-40.96 40.96-40.96h325.12c22.6304 0 40.96 18.3296 40.96 40.96s-18.3808 40.96-41.0112 40.96zM470.016 650.8544H314.368c-22.6304 0-40.96-18.3296-40.96-40.96s18.3296-40.96 40.96-40.96h155.648c22.6304 0 40.96 18.3296 40.96 40.96s-18.3296 40.96-40.96 40.96z" fill="#FFFFFF"></path><path d="M750.2336 743.1168m-189.952 0a189.952 189.952 0 1 0 379.904 0 189.952 189.952 0 1 0-379.904 0Z" fill="#FFAC3E"></path><path d="M750.2336 552.8064c-104.9088 0-189.952 85.0432-189.952 189.952 0 99.9936 77.2608 181.8624 175.36 189.3376 58.368-14.08 101.7856-66.6624 101.7856-129.3824V573.952a190.21312 190.21312 0 0 0-87.1936-21.1456z" fill="#FF7C0E"></path><path d="M645.7856 743.1168m-35.9936 0a35.9936 35.9936 0 1 0 71.9872 0 35.9936 35.9936 0 1 0-71.9872 0Z" fill="#FFFFFF"></path><path d="M750.6432 743.1168m-35.9936 0a35.9936 35.9936 0 1 0 71.9872 0 35.9936 35.9936 0 1 0-71.9872 0Z" fill="#FFFFFF"></path><path d="M855.5008 743.1168m-35.9936 0a35.9936 35.9936 0 1 0 71.9872 0 35.9936 35.9936 0 1 0-71.9872 0Z" fill="#FFFFFF"></path></svg>
							  您有<i>{{item.num}}</i> {{item.title}}
							</a>
							</li>
						  </ul>
					  </div>
					</el-dropdown-menu>
				  </el-dropdown>
				</el-badge>
			</div>
			<?php endif; ?>
			
			<div class="iconbutton">
				<el-avatar src="<?php echo config('base_config.logo'); ?>" style="vertical-align:middle"></el-avatar>
				<el-dropdown trigger="click" placement="bottom" style="cursor: pointer;margin-right:15px;">
					<span class="el-dropdown-link">
						<?php echo session('admin.username'); ?><i style="margin-left:0px; font-size:100%" class="icontool el-icon-arrow-down"></i>
					</span>
					<el-dropdown-menu slot="dropdown">
						<el-dropdown-item icon="el-icon-lock" @click.native.prevent="passwordDialogStatus = true">修改密码</el-dropdown-item>
						<el-dropdown-item icon="el-icon-back" @click.native.prevent="logout">退出</el-dropdown-item>
					</el-dropdown-menu>
				</el-dropdown>
			</div>
			<div class="iconbutton" style="margin-left:0">
				<i class="bx bx-cog bx-spin right-bar-toggle"></i>
			</div>
		</div>
	</div>
	
	<el-dialog title="重置密码" style="margin-top:100px;" width="450px"  :visible="passwordDialogStatus" :before-close="closeForm" append-to-body>
		<el-form :size="size" ref="form" :model="form" :rules="rules" label-width="80px">
			<el-row>
				<el-col :span="24">
					<el-form-item label="新密码" prop="password">
						<el-input  show-password autoComplete="off" v-model="form.password"  clearable placeholder="请输入密码"/>
					</el-form-item>
				</el-col>
			</el-row>
			<el-row>
				<el-col :span="24">
					<el-form-item label="确认密码" prop="repassword">
						<el-input  show-password autoComplete="off" v-model="form.repassword"  clearable placeholder="请输入确认密码"/>
					</el-form-item>
				</el-col>
			</el-row>
		</el-form>
		<div slot="footer" class="dialog-footer">
			<el-button :size="size" :loading="loading" type="primary" @click="submit" >
				<span v-if="!loading">确 定</span>
				<span v-else>提 交 中...</span>
			</el-button>
			<el-button :size="size" @click="closeForm">取 消</el-button>
		</div>
	</el-dialog>
</header>

<script>
new Vue({
	el: '#page-topbar',
	data(){
		var validatePass2 = (rule, value, callback) => {
			if(value === '') {
				callback(new Error('请再次输入密码'))
			}else if (value !== this.form.password) {
				callback(new Error('两次输入密码不一致!'))
			}else {
				callback()
			}
		}
		return {
			form: {
				password:'',
				repassword:'',
			},
			url:{},
			levelList:[],
			notice:[],
			passwordDialogStatus:false,
			loading:false,
			size:'small',
			urlobj:{},//这里是判断如果是弹窗链接的话 不显示头部
			rules: {
                password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
				repassword:[
					{required: true, validator: validatePass2, trigger: 'blur'},
				],
			}
		}
	},
	mounted(){
		if(sessionStorage.getItem(base_url+'breadcrumb')){
			const menuList = JSON.parse(sessionStorage.getItem(base_url+'breadcrumb'))
			this.url = new URL(window.location.href)
			let menus = this.getMenus(menuList)
			let home = [{title:'首页', path:base_url+'/Index/main.html'}]
			if (menus !== undefined) {
				if(this.url.pathname !== base_url+'/Index/main.html' && this.url.href !== base_url+'/Index/main.html'){
					menus = home.concat(menus)
				}
			}else{
				menus = home
			}
			
			this.levelList = menus
		}
	},
	methods:{
		getMenus(menuList,arr,z){
            arr = arr || []
            z = z || 0
            for (let i = 0; i < menuList.length; i++) {
                let item = menuList[i]
                arr[z] = item
                if(this.url.pathname === menuList[i].url || this.url.href === menuList[i].url){
                   return arr.slice(0,z + 1)
                }
                if(menuList[i].children && menuList[i].children.length){
                   let res = this.getMenus(menuList[i].children,arr,z+1)
                   if(res){
                       return res
                   }
                }
            }
        },
		submit(){
			this.$refs['form'].validate(valid => {
				if(valid) {
					this.loading = true
					axios.post(base_url+'/Base/resetPwd',this.form).then(res => {
						if(res.data.status == 200){
							this.$message({message: '操作成功', type: 'success'})
							this.closeForm()
						}else{
							this.$message.error('修改失败')
						}
					}).catch(()=>{
						this.loading = false
					})
				}
			})
		},
		closeForm(){
			this.passwordDialogStatus = false
			this.loading = false
			if (this.$refs['form']!==undefined) {
				this.$refs['form'].resetFields()
			}
		},
		getNotice(){
			axios.post(base_url+'/Index/getNotice').then(res => {
				if(res.data.status == 200){
					this.notice = res.data.data
				}
			})
		},
		clearCache(){
			this.$confirm('确定清除缓存吗?', '提示', {
				confirmButtonText: '确定',
				cancelButtonText: '取消',
				type: 'warning'
			}).then(()=>{
				axios.post(base_url+'/Base/clearCache').then(res => {
					if(res.data.status == 200){
						this.$message({message: '操作成功', type: 'success'})
					}
				})
			})
		},
		logout(){
			this.$confirm('确定注销并且退出系统?', '提示', {
				confirmButtonText: '确定',
				cancelButtonText: '取消',
				type: 'warning'
			}).then(()=>{
				axios.get(base_url+'/Login/logout').then(res => {
					if(res.data.status == 200){
						sessionStorage.setItem(base_url+'breadcrumb','')
						Cookies.set(base_url+'menu','')
						top.parent.frames.location.href = base_url+'/login/index'
					}
				})
			})
		},
		reload(){
			location.reload()
		},
	},
})
</script>

<div id="app" class="page-content" :style="!urlobj.dialogstate ? 'margin-top:60px;':'margin-top:10px;'">
	<tab-tag v-if="!urlobj.dialogstate"></tab-tag>
	
<div style="margin:0 15px 15px 15px;">
	<el-card shadow="never" style="min-height:650px;">
		<el-row>
			<el-menu :default-active="active.toString()" class="el-menu-demo" mode="horizontal">
				<el-menu-item @click="selectmenu(item)" v-for="item in app_list" :key="item.app_id" :index="item.app_id.toString()">
					{{item.app_type == 3 ? item.application_name+'内容模型' : item.application_name}}
				</el-menu-item>
			</el-menu>
		</el-row>
		<el-row style="margin-bottom:10px; margin-top:11px;">
			<el-col :span="21">
				<el-button type="success" size="mini" icon="el-icon-plus" @click="dialog.addAdminDialogStatus = true">创建</el-button>
				<el-button type="danger" size="mini" icon="el-icon-delete"  @click="deleteMenu()">卸载</el-button>
				<el-button type="warning" size="mini"  icon="el-icon-plus" :disabled="single" @click="field">字段管理</el-button>  
				<el-button type="warning" size="mini"  icon="el-icon-plus" :disabled="single" @click="action">方法管理</el-button>
				<el-button type="info" size="mini"  icon="el-icon-edit-outline" :disabled="single" @click="create">生成代码</el-button>
				<el-select size="small" style="margin-left:5px; width:120px;" class="select" clearable v-model="appid" placeholder="菜单复制到">
					<el-option v-for="(item,i) in copy_app_list" :key="i" :label="item.application_name" :value="item.app_id"></el-option>
				</el-select>
				<el-button type="primary" size="mini" style="margin-left:5px;" icon="el-icon-check" @click="copyMenu()">确定</el-button>
				<el-select size="small" style="margin-left:5px; width:130px" class="select" @change="selectConnect" v-model="connect" placeholder="请选择链接库">
					<el-option v-for="item in connects" :key="item" :label="item" :value="item"></el-option>
				</el-select>
				<el-select size="small" style="margin-left:5px; width:130px" class="select" v-model="tablename" placeholder="请选择表生成">
					<el-option v-for="(item,i) in tableList" :key="i" :label="item" :value="item"></el-option>
				</el-select>
				<el-button type="primary" size="mini" style="margin-left:5px;" icon="el-icon-check" @click="createByTable">生成</el-button>
			</el-col>
			<el-col :span="3" style="text-align:right">
				<table-tool :expand_status="true" :expand="expand" @toggle="toggleRowExpansion" @refesh_list="loadlist" ></table-tool>
			</el-col>
		</el-row>

		<el-table :header-cell-style="{ background: '#eef1f6', color: '#606266' }" v-loading="loading" highlight-current-row :default-expand-all="expand" @current-change="handleCurrentChange" :tree-props="{children: 'children'}" row-key="menu_id" ref="multipleTable" border class="eltable" :data="list"   style="width: 100%">
			<el-table-column property="menu_id" align="center" type='' label="编号" width="70"></el-table-column>
			<el-table-column property="title" width="240" label="菜单名称"></el-table-column>
			<el-table-column property="controller_name" label="控制器名"></el-table-column>
			<el-table-column property="table_name" label="数据表名"></el-table-column>
			<el-table-column align="center" property="create_code" label="生成代码">
				<template slot-scope="scope">
					<el-switch :active-value="1" :inactive-value="0" @change="update(scope.row,'create_code')" v-model="scope.row.create_code"></el-switch>
				</template>
			</el-table-column>
			<el-table-column align="center" property="status" label="菜单显示">
				<template slot-scope="scope">
					<el-switch :active-value="1" :inactive-value="0" @change="update(scope.row,'status')" v-model="scope.row.status"></el-switch>
				</template>
			</el-table-column>
			<el-table-column align="center" property="create_table" label="创建数据库表">
				<template slot-scope="scope">
					<el-tag size="mini" :type="scope.row.create_table=='1'?'success':'info'" effect="dark">{{ scope.row.create_table == '1' ? '是' : '否' }}</el-tag>
				</template>
			</el-table-column>
			<el-table-column width="90" align="center" property="sortid" label="排序">
				<template slot-scope="scope">
					<el-input style="width:60px;" size="mini" placeholder="排序" @blur.stop="update(scope.row,'sortid')" v-model="scope.row.sortid"></el-input>
				</template>
			</el-table-column>
			<el-table-column label="操作" align="center" width="180">
				<template slot-scope="scope">
					<el-button size="mini" @click="editorAdmin(scope.row)" icon="el-icon-edit-outline" type="primary" >修改</el-button>
					<el-button size="mini" @click="deleteMenu(scope.row)" icon="el-icon-delete" type="danger">卸载</el-button>
				</template>
			</el-table-column>
		</el-table>
	</el-card>
</div>

<admin-add :show.sync="dialog.addAdminDialogStatus" app_id="<?php echo $appid; ?>" :page_type_list="page_type_list" :list="list" :connects="connects" size="small" @refesh_list="loadlist"></admin-add>

<admin-update :show.sync="dialog.updateAdminDialogStatus" :info="info" :page_type_list="page_type_list" app_id="<?php echo $appid; ?>" :list="list" :connects="connects"  size="small" @refesh_list="loadlist"></admin-update>

</div>

<div class="right-bar" id="rightbar">
	<div data-simplebar class="h-100">
		<div class="rightbar-title flex align-items-center bg-dark p-3">
			<h5 class="m-0 me-2 text-white">主题设置</h5>
			<a href="javascript:void(0);" class="right-bar-toggle ms-auto">
				<i class="mdi mdi-close noti-icon"></i>
			</a>
		</div>
		<div class="drawer-container">
			<div class="drawer-item">
				<span>标签页</span>
				<el-switch @change="selectTag" :active-value="1" :inactive-value="0" v-model="setting.tagsView" class="drawer-switch" />
			</div>
			<div class="drawer-item">
				<p>顶部背景色</p>
				<el-radio-group v-model="setting.topbg" @change="selectTopBg" size="mini">
					<el-radio-button label="light">白色</el-radio-button>
					<el-radio-button label="blank">黑色</el-radio-button>
					<el-radio-button label="dark">蓝色</el-radio-button>
				</el-radio-group>
			</div>
			<div class="drawer-item">
				<p>侧栏背景色</p>
				<el-radio-group v-model="setting.sidebg" @change="selectSideBg" size="mini">
					<el-radio-button label="dark">黑色</el-radio-button>
					<el-radio-button label="brand">蓝色</el-radio-button>
					<el-radio-button label="light">白色</el-radio-button>
				</el-radio-group>
			</div>
        </div>
	</div>
</div>
<div class="rightbar-overlay"></div>
<script>
var siteconfig 
if(Cookies.get(base_url+'siteconfig')){
	siteconfig = JSON.parse(Cookies.get(base_url+'siteconfig'))
	document.body.setAttribute('data-topbar', siteconfig.topbg)
	parent.document.body.setAttribute('data-sidebar', siteconfig.sidebg)
	var classname = !siteconfig.tagsView ? 'hiddenbox' : 'showbox'
	document.getElementById('app').setAttribute('tag-box', classname)
}

new Vue({
	el: '#rightbar',
	data(){
		return {
			setting:{
				tagsView:1,
				topbg:'light',
				sidebg:'dark',
			}
		}
	},
	mounted(){
		if(Cookies.get(base_url+'siteconfig')){
			this.setting = JSON.parse(Cookies.get(base_url+'siteconfig'))
		}
	},
	methods:{
		selectTopBg(val){
			document.body.setAttribute('data-topbar', val)
			Cookies.set(base_url+'siteconfig',JSON.stringify(this.setting))
		},
		selectSideBg(val){
			parent.document.body.setAttribute('data-sidebar', val)
			Cookies.set(base_url+'siteconfig',JSON.stringify(this.setting))
		},
		selectTag(val){
			var classname = !val ? 'hiddenbox' : 'showbox'
			document.getElementById('app').setAttribute('tag-box', classname)
			Cookies.set(base_url+'siteconfig',JSON.stringify(this.setting))
		}
	},
})
</script>

<script src="/assets/libs/treeselect/vue-treeselect.umd.min.js"></script>
<link rel="stylesheet" href="/assets/libs/treeselect/vue-treeselect.min.css">
<script src="/components/sys/menu.js"></script>
<script src="/assets/js/app.js"></script>
<script>
new Vue({
	el: '#app',
	data() {
		return {
			dialog: {
				addAdminDialogStatus : false,
				updateAdminDialogStatus : false,
			},
			expand:true,
			id:'',
			single:true,
			list: [],
			connects:[],
			connect:'',
			tablename:'',
			tableList:[],
			page_type_list:[],
			app_type:1,
			app_list:[],
			copy_app_list:[],
			info:{},
			appid:'',
			loading: false,
			active:'<?php echo $appid; ?>'
		};
	},
	methods: {
		editorAdmin(row) {
			axios.post(base_url+'/Sys.Base/getMenuInfo',{menu_id:row.menu_id}).then(res => {
				this.dialog.updateAdminDialogStatus = true
				this.info = res.data.data
			})
		},
		selectmenu(val){
			var path = {
				title:'菜单管理',
				url:base_url+'/Sys.Base/menu',
				fullurl:base_url+'/Sys.Base/menu?appid='+val.app_id
			}
			this.setTags(path)
			location.href = path.fullurl
		},
		field(){
			var path = {
				title:'字段管理',
				url:base_url+'/Sys.Base/fieldList',
				fullurl:base_url+'/Sys.Base/fieldList?menu_id='+this.id+'&appid=<?php echo $appid; ?>'
			}
			this.setTags(path)
			location.href = path.fullurl
		},
		action(){
			var path = {
				title:'方法管理',
				url:base_url+'/Sys.Base/actionList',
				fullurl:base_url+'/Sys.Base/actionList?menu_id='+this.id+'&appid=<?php echo $appid; ?>'
			}
			this.setTags(path)
			location.href = path.fullurl
		},
		setTags(path){
			var noUrl = true
			var changeData = false
			if(Cookies.get('menu')){
				var tags = JSON.parse(Cookies.get('menu'))
				tags.forEach(item=>{
					if(item.url == path.url){
						noUrl = false 
						if(item.fullurl !== path.fullurl){
							changeData = true
						}
					}
				})
				if(noUrl){
					tags.push(path)
					Cookies.set('menu',JSON.stringify(tags))
				}
				
				if(changeData){
					tags.forEach(item=>{
						if(item.url == path.url){
							item.fullurl = path.fullurl
						}
					})
					Cookies.set('menu',JSON.stringify(tags))
				}
			}
		},
		handleCurrentChange(val) {
			this.id = val.menu_id
			this.single = false
		},
		toggleRowExpansion(){
			this.expand = !this.expand
			this.list.forEach(item=>{
				this.$refs.multipleTable.toggleRowExpansion(item,this.expand)
			})
		},
		selectConnect(val){
			axios.post(base_url+'/Sys.Base/getTables',{connect:this.connect}).then(res => {
				this.tableList = res.data.data
			})
		},
		deleteMenu() {
			this.$confirm('确定卸载吗?', '提示', {
				confirmButtonText: '确定',
				cancelButtonText: '取消',
				type: 'warning'
			}).then(() => {
				axios.post(base_url+'/Sys.Base/deleteMenu',{menu_id:this.id}).then(res => {
					if(res.data.status == 200){
						this.$message({message: '操作成功', type: 'success'})
						this.loadlist()
					}else{
						this.$message.error(res.data.msg)
					}
					
				})
			}).catch(() => {})
		},
		update(row,field){
			axios.post(base_url+'/Sys.Base/updateMenuExt',{menu_id:row.menu_id,[field]:row[field]}).then(res => {
				if(res.data.status == 200){
					this.$message({message: '操作成功', type: 'success'})
				}else{
					this.$message.error(res.data.msg)
				}
			})
		},
		create(){
			this.$confirm('确定生成吗?', '提示', {
				confirmButtonText: '确定',
				cancelButtonText: '取消',
				type: 'warning'
			}).then(() => {
				axios.post(base_url+'/Sys.Base/create',{menu_id:this.id}).then(res => {
					if(res.data.status == 200){
						this.$message({message: '操作成功', type: 'success'})
					}else{
						this.$message.error(res.data.msg)
					}
				})
			}).catch(() => {})
		},
		createByTable(){
			if(this.tablename == ''){
				this.$message.error('请选择生成表')
			}else{
				this.$confirm('确定生成吗?', '提示', {
					confirmButtonText: '确定',
					cancelButtonText: '取消',
					type: 'warning'
				}).then(() => {
					if(this.connect == ''){
						this.connect = 'mysql'
					}
					axios.post(base_url+'/Sys.Base/createByTable',{connect:this.connect,table_name:this.tablename,app_id:'<?php echo $appid; ?>',app_type:this.app_type}).then(res => {
						if(res.data.status == 200){
							this.$message({message: '操作成功', type: 'success'})
							this.loadlist()
						}else{
							this.$message.error(res.data.msg)
						}
					})
				}).catch(() => {})
			}
		},
		copyMenu(){
			if(this.id == '' || this.appid == ''){
				this.$message.error('请选择菜单或者应用')
			}else{
				this.$confirm('确定生成吗?', '提示', {
					confirmButtonText: '确定',
					cancelButtonText: '取消',
					type: 'warning'
				}).then(() => {
					axios.post(base_url+'/Sys.Base/copyMenu',{appid:this.appid,menu_id:this.id}).then(res => {
						if(res.data.status == 200){
							this.$message({message: '操作成功', type: 'success'})
							this.loadlist()
						}else{
							this.$message.error(res.data.msg)
						}
					})
				}).catch(() => {})
			}
		},
		loadlist() { 
			this.loading = true
			axios.post(base_url+'/Sys.Base/menu',{app_id:'<?php echo $appid; ?>'}).then(res => {
				this.list = res.data.list
				this.connects = res.data.connects
				//this.connect = res.data.defaultConnect
				this.tableList = res.data.tableList
				this.app_list = res.data.app_list
				this.copy_app_list = res.data.app_list.filter(item=>item.app_type !== 3)
				this.page_type_list = res.data.page_type_list
				this.loading = false
			})
		},
	},
	mounted() {
		this.loadlist()
	},
})
</script>

</body>
</html>