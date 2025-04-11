<?php /*a:2:{s:74:"/www/wwwroot/11.fanlipt.com/app/admin/controller/Sys/view/field/admin.html";i:1645080620;s:64:"/www/wwwroot/11.fanlipt.com/app/admin/view/common/container.html";i:1643093912;}*/ ?>
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
		<div style="border-bottom:1px solid #ebeef5; padding-bottom:15px; font-size:14px;" class="clearfix">
			<span>{{menu_title}} 字段列表 (支持拖动排序)</span>
			<el-button size="small" @click="backup" type="primary" icon="el-icon-back" style="float:right">返回</el-button>
		</div>

		<el-row style="margin-bottom:9px; margin-top:11px;">
			<el-col :span="21">
				<el-button type="success" size="mini" icon="el-icon-plus"  @click="dialog.addDialogStatus = true">新增</el-button>
				<el-button type="danger" size="mini"  icon="el-icon-delete" :disabled="multiple" @click="deleteField(ids)">删除</el-button>
				<el-button type="info" size="mini"  icon="el-icon-edit-outline" @click="create">生成代码</el-button>
			</el-col>
			<el-col :span="3" style="text-align:right">
				<table-tool :expand_status="false" @refesh_list="loadlist" ></table-tool>
			</el-col>
		</el-row>

		<el-row>
			<el-table row-key="id" :header-cell-style="{ background: '#eef1f6', color: '#606266' }" :row-class-name="rowClass" v-loading="loading" ref="multipleTable" border class="eltable" :data="list" @selection-change="selection"  @row-click="handleRowClick" style="width: 100%">
				<el-table-column align="center" type="selection" width="42"></el-table-column>
				<el-table-column property="id" align="center" label="编号" width="65"></el-table-column>
				<el-table-column property="title"  label="字段标题">
					<template slot-scope="scope">
						<el-input size="mini" placeholder="字段标题" @blur.stop="updateFieldExt(scope.row,'title')" v-model="scope.row.title"></el-input>
					</template>
				</el-table-column>
				<el-table-column property="field" label="字段名称">
					<template slot-scope="scope">
						<el-input size="mini" placeholder="字段名称" @blur.stop="updateField(scope.row,'field')" v-model="scope.row.field"></el-input>
					</template>
				</el-table-column>
				<el-table-column property="type" label="字段类型">
					<template slot-scope="scope">
						<el-select v-model="scope.row.type" size="mini" @change="updateFieldExt(scope.row,'type')" filterable placeholder="请选择">
							<el-option v-for="(item,i) in field" :key="i" :label="item.name" :value="item.type"></el-option>
						</el-select>
					</template>
				</el-table-column>
				<el-table-column property="list_show" label="显示位置/状态">
					<template slot-scope="scope">
						<el-select v-model="scope.row.list_show" @change="updateFieldExt(scope.row,'list_show')" size="mini" filterable placeholder="请选择">
							<el-option-group label="显示状态">
								<el-option key="2" label="不显示" :value="0"></el-option>
							</el-option-group>
							<el-option-group label="显示位置">
								<el-option key="1" label="居中" :value="2"></el-option>
								<el-option key="2" label="居左" :value="3"></el-option>
								<el-option key="3" label="居右" :value="4"></el-option>
							</el-option-group>
						</el-select>
					</template>
				</el-table-column>
				<el-table-column align="left" property="search_type" label="搜索状态/模式">
					<template slot-scope="scope">
						<el-select v-model="scope.row.search_type" @change="updateFieldExt(scope.row,'search_type')" size="mini" placeholder="请选择">
							<el-option-group label="是否搜索">
								<el-option key="1" label="否" :value="0"></el-option>
							</el-option-group>
							<el-option-group label="搜索模式">
								<el-option key="1" label="=" :value="1"></el-option>
								<el-option key="2" label="like" :value="2"></el-option>
							</el-option-group>
						</el-select>
					</template>
				</el-table-column>
				<el-table-column width="75" align="center" property="create_table_field" label="创建字段">
					<template slot-scope="scope">
						<el-tag size="mini" @blur.stop="updateFieldExt(scope.row,'create_table_field')" :type="scope.row.create_table_field=='1'?'primary':'info'" effect="dark">{{ scope.row.create_table_field == '1' ? '是' : '否' }}</el-tag>
					</template>
				</el-table-column>
				<el-table-column width="75" align="center" property="post_status" label="录入状态">
					<template slot-scope="scope">
						<el-tag size="mini" @blur.stop="updateFieldExt(scope.row,'post_status')" :type="scope.row.post_status=='1'?'primary':'info'" effect="dark">{{ scope.row.post_status == '1' ? '是' : '否' }}</el-tag>
					</template>
				</el-table-column>
				<el-table-column width="100" align="center" property="width" label="单元格宽度">
					<template slot-scope="scope">
						<el-input style="width:60px" @blur.stop="updateFieldExt(scope.row,'width')" size="mini" placeholder="宽度" v-model="scope.row.width"></el-input>
					</template>
				</el-table-column>
				<el-table-column width="90" align="center" property="sortid" label="排序">
					<template slot-scope="scope">
						<el-input style="width:60px;" @blur.stop="updateFieldExt(scope.row,'sortid')"  size="mini" placeholder="排序" v-model="scope.row.sortid"></el-input>
					</template>
				</el-table-column>
				<el-table-column align="center" property="datatyp" label="数据结构">
					<template slot-scope="scope">
						{{scope.row.datatype}}({{scope.row.length}})
					</template>
				</el-table-column>
				<el-table-column :fixed="false" label="操作" align="center" width="135">
					<template slot-scope="scope">
						<el-button size="mini" style="padding:7px 5px" type="primary" icon="el-icon-edit-outline" @click="editor(scope.row)">修改</el-button>
						<el-button size="mini" style="padding:7px 5px" type="danger" icon="el-icon-delete" @click="deleteField(scope.row)" >删除</el-button>
					</template>
				</el-table-column>
			</el-table> 
			<Page :total="page_data.total" :page.sync="page_data.page" :limit.sync="page_data.limit" @pagination="loadlist" />
		</el-row>
	</el-card>
</div>

<admin-add :show.sync="dialog.addDialogStatus" menuid="<?php echo $menu_id; ?>" :field="field" :item_field="itemList" size="small" @refesh_list="loadlist"></admin-add>

<admin-update :show.sync="dialog.updateDialogStatus" menu_id="<?php echo $menu_id; ?>" :info="info" :field="field" :item_field="itemList" size="small" @refesh_list="loadlist"></admin-update>
	

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

<script src="/components/sys/field.js"></script>
<script src="/assets/js/Sortable.min.js"></script>
<script src="/assets/libs/vuedragable/Sortable.min.js"></script>
<script src="/assets/libs/vuedragable/vuedraggable.umd.min.js"></script>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/common.js" type="module"></script>
<script>
new Vue({
	el: '#app',
	components:{
		'draggable':window.vuedraggable,
	},
	data() {
		return {
			dialog: {
				addDialogStatus : false,
				updateDialogStatus : false,
			},
			menu_title:'',
			ids: {},
			field_titles:[],
			single:true,
			multiple: true,
			list: [],
			field:[],
			itemList:[],
			info:{},
			loading: false,
			page_data: {
				limit: 20,
				page: 1,
				total: 50,
			},
		};
	},
	methods: {
		editor(row) {
			let id = row.id ? row.id : this.ids.join(',')
			axios.post(base_url+'/Sys.Base/getFieldInfo',{id:id}).then(res => {
				this.dialog.updateDialogStatus = true
				this.info = res.data.data
			})
		},
		selection(selection) {
			this.ids = selection.map(item => item.id)
			this.single = selection.length != 1
			this.multiple = !selection.length
		},
		handleRowClick(row, rowIndex){
			this.$refs.multipleTable.toggleRowSelection(row);
		},
		rowClass ({ row, rowIndex }) {
			for(let i=0;i<this.ids.length;i++) {
				if (row.id === this.ids[i]) {
					return 'rowLight'
				}
			}
		},
		backup(){
			location.href = base_url+'/Sys.Base/menu?appid=<?php echo $appid; ?>'
		},
		deleteField(row) {
			this.$confirm('确定删除字段吗?', '提示', {
				confirmButtonText: '确定',
				cancelButtonText: '取消',
				type: 'warning'
			}).then(() => {
				let ids = row.id ? row.id : this.ids
				axios.post(base_url+'/Sys.Base/deleteField',{id:ids,menu_id:'<?php echo $menu_id; ?>'}).then(res => {
					if(res.data.status == 200){
						this.$message({message: res.data.pk_status ? '操作成功,其中主键无法删除' :'操作成功', type: 'success'})
						this.loadlist()
					}else{
						this.$message.error(res.data.msg)
					}
				})
			}).catch(() => {})
		},
		updateFieldExt(row,field){
			axios.post(base_url+'/Sys.Base/updateFieldExt',{id:row.id,[field]:row[field]}).then(res => {
				if(res.data.status == 200){
					this.$message({message: '操作成功', type: 'success'})
				}else{
					this.$message.error(res.data.msg)
				}
			})
		},
		updateField(row){
			axios.post(base_url+'/Sys.Base/updateField',Object.assign(row, {field_type:1})).then(res => {
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
				axios.post(base_url+'/Sys.Base/create',{menu_id:'<?php echo $menu_id; ?>'}).then(res => {
					if(res.data.status == 200){
						this.$message({message: '操作成功', type: 'success'})
					}else{
						this.$message.error(res.data.msg)
					}
				})
			}).catch(() => {})
		},
		loadlist() { 
			let param = {
				limit:this.page_data.limit,
				page:this.page_data.page,
				menu_id:'<?php echo $menu_id; ?>'
			}
			this.loading = true
			axios.post(base_url+'/Sys.Base/fieldList',param).then(res => {
				this.menu_title = res.data.menu_title
				this.list = res.data.data.data
				this.field =  res.data.typeField
				this.itemList = res.data.itemList
				this.page_data.total = res.data.data.total
				this.loading = false
			})
		},
		rowDrop() {
			const el = this.$refs.multipleTable.$el.querySelectorAll('.el-table__body-wrapper > table > tbody')[0]
			this.sortable = Sortable.create(el, {
				ghostClass: 'sortable-ghost',
				setData: function (dataTransfer) {
					dataTransfer.setData('Text', '')
				},
				onEnd: e => {
					const targetRow = this.list.splice(e.oldIndex, 1)[0]
					this.list.splice(e.newIndex, 0, targetRow)
					let currentId = this.list[e.newIndex].id
					let preId,nextId
					if( this.list[e.newIndex-1]){
						preId = this.list[e.newIndex-1].id
					}else {
						preId = ""
					}
					if( this.list[e.newIndex+1]){
						nextId = this.list[e.newIndex+1].id
					}else {
						nextId = ""
					}
					axios.post(base_url+'/Sys.Base/updateFieldSort',{currentId:currentId,preId:preId,nextId:nextId,menu_id:'<?php echo $menu_id; ?>'}).then(res => {
						this.loadlist()
						this.$message({message: '操作成功', type: 'success'})
					})
				}
			})
		},
	},
	mounted() {
		this.loadlist()
		this.rowDrop()
	},
})
</script>

</body>
</html>