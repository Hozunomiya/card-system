webpackJsonp([6,11],{"1Rx3":function(t,a,e){"use strict";function r(t){return Object(p.a)({url:"dashboard",method:"post",params:t})}var s,n,i,o,l,d,c,p,h,u,_,v,f,y,m,b;Object.defineProperty(a,"__esModule",{value:!0}),s=e("woOf"),n=e.n(s),i=e("Dd8w"),o=e.n(i),l=e("Y81h"),d=e.n(l),c=e("NYxO"),p=e("Vo7i"),h=e("HiEW"),u=e("FWz8"),_=e("EfZx"),v=e("+ZRQ"),f=e("RuIX"),y={components:{orderCountLineChart:_.default,orderSumLineChart:v.default,payPieChart:f.default},data:function(){return{processBar:{load:0,need:0},dashboard:{today:{count:0,income:0,profit:0},yesterday:{count:0,income:0,profit:0},complaints_count:0,complaints_24hours:0,need_ship_count:0},orderStat:{day:7,data:[]},payStat:{day:7,data:{}}}},computed:o()({},Object(c.mapGetters)(["userInfo"])),watch:{processBar:{handler:function(t){t.load<t.need?d.a.isStarted()?d.a.inc():d.a.start():d.a.done()},deep:!0}},mounted:function(){window.bus.$on("app-resize",this.resizeHandler),this.initData()},methods:{resizeHandler:function(){var t=this;["order-count-line-chart","order-sum-line-chart","pay-pie-chart"].forEach(function(a){t.$refs[a]&&t.$refs[a].resizeHandler()})},initData:function(){var t=this;this.processBar.need++,r().then(function(a){n()(t.dashboard,a.data),t.$nextTick(function(){t.getOrderStat(),t.getPayStat()}),t.processBar.load++})},reloadDashBoard:function(){var t=this;this.processBar.need++,r().then(function(a){n()(t.dashboard,a.data),t.processBar.load++})},getOrderStat:function(){var t=this;this.processBar.need++,Object(u.h)({day:this.orderStat.day}).then(function(a){t.orderStat.data=a.data,t.$nextTick(function(){t.$refs["order-count-line-chart"]&&t.$refs["order-count-line-chart"].updateChart(),t.$refs["order-sum-line-chart"]&&t.$refs["order-sum-line-chart"].updateChart()}),t.processBar.load++})},getPayStat:function(){var t=this;this.processBar.need++,Object(h.j)({day:this.payStat.day}).then(function(a){t.payStat.data=a.data,t.$nextTick(function(){t.$refs["pay-pie-chart"]&&t.$refs["pay-pie-chart"].updateChart()}),t.processBar.load++})}}},m={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{ref:"container",staticClass:"app-container"},[e("p",[t._v("欢迎回来，"+t._s(t.userInfo.name))]),t._v(" "),e("el-card",{staticClass:"my-card home-stats"},[e("span",{staticClass:"info"},[t._v("账户余额："+t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.userInfo.m_balance))))]),t._v(" "),e("span",{staticClass:"info"},[t._v("总计收入："+t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.userInfo.m_all))))]),t._v(" "),e("br"),t._v(" "),e("span",{staticClass:"info"},[t._v("今日订单： "+t._s(t.dashboard.today.count))]),t._v(" "),e("span",{staticClass:"info"},[t._v("今日收入："),e("span",{staticClass:"black-text"},[t._v(t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.dashboard.today.income))))])]),t._v(" "),e("span",{staticClass:"info"},[t._v("今日利润："),e("span",{staticClass:"red-text"},[t._v(t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.dashboard.today.profit))))])]),t._v(" "),e("span",{staticClass:"info"},[t._v("昨日订单： "+t._s(t.dashboard.yesterday.count))]),t._v(" "),e("span",{staticClass:"info"},[t._v("昨日收入："),e("span",{staticClass:"black-text"},[t._v(t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.dashboard.yesterday.income))))])]),t._v(" "),e("span",{staticClass:"info"},[t._v("昨日利润："),e("span",{staticClass:"red-text"},[t._v(t._s(t._f("moneyFormatterFilter")(t._f("moneyFilter")(t.dashboard.yesterday.profit))))])]),t._v(" "),t._e(),t._v(" "),e("div",{staticClass:"clearfix"})]),t._v(" "),t.dashboard.need_ship_count?e("el-alert",{staticClass:"my-card todo-overview",attrs:{title:"未发货订单通知",type:"warning"}},[e("div",[e("span",{staticClass:"info"},[t._v("目前您有 "),e("span",{staticClass:"red-text"},[t._v(t._s(t.dashboard.need_ship_count))]),t._v(" 个订单由于库存不足没有发货， ")]),t._v(" "),e("router-link",{staticClass:"info",staticStyle:{color:"#409EFF"},attrs:{to:"/admin/order/list?status=paid"}},[t._v("去处理\n      ")])],1)]):t._e(),t._v(" "),e("el-card",{staticClass:"my-card card-mobile-padding"},[e("div",{attrs:{slot:"header"},slot:"header"},[e("span",{staticStyle:{"line-height":"28px"}},[t._v("订单数目统计")]),t._v(" \n      "),e("el-select",{staticStyle:{width:"90px"},attrs:{placeholder:"请选择",value:"",size:"mini"},on:{change:t.getOrderStat},model:{value:t.orderStat.day,callback:function(a){t.$set(t.orderStat,"day",a)},expression:"orderStat.day"}},[e("el-option",{attrs:{label:"7天",value:7}}),t._v(" "),e("el-option",{attrs:{label:"15天",value:15}}),t._v(" "),e("el-option",{attrs:{label:"30天",value:30}})],1),t._v(" "),e("a",{staticClass:"icon-btn",staticStyle:{"line-height":"28px",float:"right"},on:{click:t.getOrderStat}},[e("icon",{attrs:{name:"refresh"}})],1)],1),t._v(" "),e("order-count-line-chart",{ref:"order-count-line-chart",attrs:{Statistic:t.orderStat}})],1),t._v(" "),e("el-card",{staticClass:"my-card card-mobile-padding"},[e("div",{attrs:{slot:"header"},slot:"header"},[e("span",{staticStyle:{"line-height":"28px"}},[t._v("订单金额统计")]),t._v(" \n      "),e("el-select",{staticStyle:{width:"90px"},attrs:{placeholder:"请选择",value:"",size:"mini"},on:{change:t.getOrderStat},model:{value:t.orderStat.day,callback:function(a){t.$set(t.orderStat,"day",a)},expression:"orderStat.day"}},[e("el-option",{attrs:{label:"7天",value:7}}),t._v(" "),e("el-option",{attrs:{label:"15天",value:15}}),t._v(" "),e("el-option",{attrs:{label:"30天",value:30}})],1),t._v(" "),e("a",{staticClass:"icon-btn",staticStyle:{"line-height":"28px",float:"right"},on:{click:t.getOrderStat}},[e("icon",{attrs:{name:"refresh"}})],1)],1),t._v(" "),e("order-sum-line-chart",{ref:"order-sum-line-chart",attrs:{Statistic:t.orderStat}})],1),t._v(" "),e("el-card",{staticClass:"my-card card-mobile-padding"},[e("div",{attrs:{slot:"header"},slot:"header"},[e("span",{staticStyle:{"line-height":"28px"}},[t._v("支付方式")]),t._v(" \n      "),e("el-select",{staticStyle:{width:"90px"},attrs:{placeholder:"请选择",value:"",size:"mini"},on:{change:t.getPayStat},model:{value:t.payStat.day,callback:function(a){t.$set(t.payStat,"day",a)},expression:"payStat.day"}},[e("el-option",{attrs:{label:"今日",value:1}}),t._v(" "),e("el-option",{attrs:{label:"7天",value:7}}),t._v(" "),e("el-option",{attrs:{label:"15天",value:15}}),t._v(" "),e("el-option",{attrs:{label:"30天",value:30}})],1),t._v(" "),e("a",{staticClass:"icon-btn",staticStyle:{"line-height":"28px",float:"right"},on:{click:t.getPayStat}},[e("icon",{attrs:{name:"refresh"}})],1)],1),t._v(" "),e("pay-pie-chart",{ref:"pay-pie-chart",attrs:{Statistic:t.payStat}})],1)],1)},staticRenderFns:[]},b=e("VU/8")(y,m,!1,function(t){e("sNNJ")},"data-v-74329e70",null),a.default=b.exports},ARoL:function(t,a,e){"use strict";var r,s,n;Object.defineProperty(a,"__esModule",{value:!0}),r={name:"dashboard",components:{AdminDashboard:e("1Rx3").default}},s={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"dashboard-container"},[e("admin-dashboard")],1)},staticRenderFns:[]},n=e("VU/8")(r,s,!1,null,null,null),a.default=n.exports},sNNJ:function(t,a){}});