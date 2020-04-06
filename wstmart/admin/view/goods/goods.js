var mmg;
function initSaleGrid(){
    var h = WST.pageHeight();
    var cols = [
            {title:'&nbsp;', name:'goodsImg', width: 30, renderer: function(val,item,rowIndex){
            	var thumb = item['goodsImg'];
	        	thumb = thumb.replace('.','_thumb.');
            	return "<span class='weixin'><img id='img' onmouseout='toolTip()' onmouseover='toolTip()' style='height:60px;width:60px;' src='"+WST.conf.ROOT+"/"+thumb
            	+"'><span class='imged' ><img  style='height:180px;width:180px;' src='"+WST.conf.ROOT+"/"+item['goodsImg']+"'></span></span>";
            }},
            {title:'商品名称', name:'goodsName', width: 160,sortable:true,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsName']+"</p></span>";
            }},
            {title:'商品编号', name:'goodsSn' ,width:60,sortable:true},
            {title:'市场价格', name:'marketPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return '￥'+item['marketPrice'];
            }},
            {title:'店铺价格', name:'shopPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return '￥'+item['shopPrice'];
            }},
            {title:'供货价格', name:'supplyPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return '￥'+item['supplyPrice'];
            }},
            {title:'商品积分', name:'goodsPoint' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsPoint'];
            }},
            {title:'双倍积分', name:'isDouble' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                if(item['isDouble'] == 0){
                    return "<span> 否 </span>";
                }else if(item['isDouble'] == 1){
                    return "<span> 是 </span>";
                }
            }},
            {title:'商品奖金', name:'goodsReward' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsReward'];
            }},
            {title:'商品折扣', name:'goodsDiscount' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsDiscount'];
            }},
            {title:'商品税率', name:'goodsRate' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                if(item['goodsRate'] == 0){
                    return "<span> 0% / 普票 </span>";
                }else if(item['goodsRate'] == 1){
                    return "<span> 专票3% </span>";
                }else if(item['goodsRate'] == 2){
                    return "<span> 专票10% </span>";
                }else if(item['goodsRate'] == 3){
                    return "<span> 专票16% </span>";
                }
            }},

            {title:'所属店铺', name:'shopName' ,width:60,sortable:true},
            {title:'所属分类', name:'goodsCatName' ,width:60,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsCatName']+"</p></span>";
            }},
            {title:'销量', name:'saleNum' ,width:20,sortable:true,align:'center'},
            {title:'操作', name:'' ,width:150, align:'center', renderer: function(val,item,rowIndex){
                var h = "";
	            h += "<a class='btn btn-blue' target='_blank' href='"+WST.U("home/goods/detail","goodsId="+item['goodsId'])+"'><i class='fa fa-search'></i>查看</a> ";
                if(WST.GRANT.SJSP_03)h += "<a class='btn btn-blue' href='"+WST.U("admin/goods/edit","goodsId="+item['goodsId'])+"'><i class='fa fa-pencil'></i>编辑</a> ";
                if(WST.GRANT.SJSP_04)h += "<a class='btn btn-red' href='javascript:illegal(" + item['goodsId'] + ",1)'><i class='fa fa-ban'></i>违规下架</a> ";
	            if(WST.GRANT.SJSP_03)h += "<a class='btn btn-red' href='javascript:del(" + item['goodsId'] + ",1)'><i class='fa fa-trash-o'></i>删除</a> "; 
	            return h;
            }}
            ];
 
    mmg = $('.mmg').mmGrid({height: (h-85),indexCol: true, indexColWidth:50, cols: cols,method:'POST',
        url: WST.U('admin/goods/saleByPage'), fullWidthRows: true, autoLoad: true,remoteSort: true,sortName:'goodsSn',sortStatus:'desc',
        plugins: [
            $('#pg').mmPaginator({})
        ]
    });     
}
function loadGrid(){
	var params = WST.getParams('.j-ipt');
	params.areaIdPath = WST.ITGetAllAreaVals('areaId1','j-areas').join('_');
	params.goodsCatIdPath = WST.ITGetAllGoodsCatVals('cat_0','pgoodsCats').join('_');
    params.page = 1;
	mmg.load(params);
}

function del(id,type){
	var box = WST.confirm({content:"您确定要删除该商品吗?",yes:function(){
	           var loading = WST.msg('正在提交数据，请稍后...', {icon: 16,time:60000});
	           $.post(WST.U('admin/goods/del'),{id:id},function(data,textStatus){
	           			layer.close(loading);
	           			var json = WST.toAdminJson(data);
	           			if(json.status=='1'){
	           			    WST.msg(json.msg,{icon:1});
	           			    layer.close(box);
	           			    loadGrid();
	           			}else{
	           			    WST.msg(json.msg,{icon:2});
	           			}
	           		});
	            }});
}
function illegal(id,type){
	var w = WST.open({type: 1,title:((type==1)?"商品违规原因":"商品不通过原因"),shade: [0.6, '#000'],border: [0],
	    content: '<textarea id="illegalRemarks" rows="7" style="width:100%" maxLength="200"></textarea>',
	    area: ['500px', '260px'],btn: ['确定', '关闭窗口'],
        yes: function(index, layero){
        	var illegalRemarks = $.trim($('#illegalRemarks').val());
        	if(illegalRemarks==''){
        		WST.msg(((type==1)?'请输入违规原因 !':'请输入不通过原因!'), {icon: 5});
        		return;
        	}
        	var ll = WST.msg('数据处理中，请稍候...');
		    $.post(WST.U('admin/goods/illegal'),{id:id,illegalRemarks:illegalRemarks},function(data){
		    	layer.close(w);
		    	layer.close(ll);
		    	var json = WST.toAdminJson(data);
				if(json.status>0){
					WST.msg(json.msg, {icon: 1});
					loadGrid();
				}else{
					WST.msg(json.msg, {icon: 2});
				}
		   });
        }
	});
}

function initAuditGrid(){
    var h = WST.pageHeight();
    var cols = [
            {title:'商品ID', name:'goodsId' ,width:30,sortable:true},
            {title:'&nbsp;', name:'goodsName', width: 30, renderer: function(val,item,rowIndex){
            	return "<span class='weixin'><img class='img' style='height:60px;width:60px;' src='"+WST.conf.ROOT+"/"+item['goodsImg']+"'><img class='imged' style='height:200px;width:200px;' src='"+WST.conf.ROOT+"/"+item['goodsImg']+"'></span>";
            }},
            {title:'商品名称', name:'goodsName', width: 160,sortable:true,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsName']+"</p></span>";
            }},
            {title:'商品编号', name:'goodsSn' ,width:60,sortable:true},
            {title:'市场价格', name:'marketPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return '￥'+item['marketPrice'];
            }},
            {title:'店铺价格', name:'shopPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
            	return '￥'+item['shopPrice'];
            }},
            {title:'供货价格', name:'supplyPrice' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return '￥'+item['supplyPrice'];
            }},
            {title:'商品积分', name:'goodsPoint' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsPoint'];
            }},
            {title:'双倍积分', name:'isDouble' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                if(item['isDouble'] == 0){
                    return "<span> 否 </span>";
                }else if(item['isDouble'] == 1){
                   return "<span> 是 </span>";
                }
            }},
            {title:'商品奖金', name:'goodsReward' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsReward'];
            }},
            {title:'商品折扣', name:'goodsDiscount' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                return item['goodsDiscount'];
            }},
            {title:'商品税率', name:'goodsRate' ,width:20,sortable:true, renderer: function(val,item,rowIndex){
                if(item['goodsRate'] == 0){
                    return "<span> 0% / 普票 </span>";
                }else if(item['goodsRate'] == 1){
                   return "<span> 专票3% </span>";
                }else if(item['goodsRate'] ==2 ){
                    return "<span> 专票10% </span>";
                }else if(item['goodsRate'] == 3){
                    return "<span> 专票16% </span>";
                }
            }},
            {title:'所属店铺', name:'shopName' ,width:60,sortable:true},
            {title:'所属分类', name:'goodsCatName' ,width:60,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsCatName']+"</p></span>";
            }},
            {title:'销量', name:'saleNum' ,width:20,sortable:true,align:'center'},
            {title:'操作', name:'' ,width:150, align:'center', renderer: function(val,item,rowIndex){
                var h = "";
	            h += "<a class='btn btn-blue' target='_blank' href='"+WST.U("home/goods/detail","goodsId="+item['goodsId']+"&key="+item['verfiycode'])+"'><i class='fa fa-search'></i>查看</a> ";
	            if(WST.GRANT.DSHSP_04)h += "<a class='btn btn-blue' href='javascript:allow(" + item['goodsId'] + ",0)'><i class='fa fa-check'></i>审核通过</a> ";
	            if(WST.GRANT.DSHSP_04)h += "<a class='btn btn-red' href='javascript:illegal(" + item['goodsId'] + ",0)'><i class='fa fa-ban'></i>审核不通过</a> ";
	            if(WST.GRANT.DSHSP_03)h += "<a class='btn btn-red' href='javascript:del(" + item['goodsId'] + ",0)'><i class='fa fa-trash-o'></i>删除</a>"; 
	            return h;
            }}
            ];
 
    mmg = $('.mmg').mmGrid({height: (h-85),indexCol: true, indexColWidth:40, cols: cols,method:'POST',checkCol:true,multiSelect:true,
        url: WST.U('admin/goods/auditByPage'), fullWidthRows: true, autoLoad: true,remoteSort: true,sortName:'goodsSn',sortStatus:'desc',
        plugins: [
            $('#pg').mmPaginator({})
        ]
    }); 
}
// 批量审核通过
function toBatchAllow(){
	var rows = mmg.selectedRows();
	if(rows.length==0){
		 WST.msg('请选择商品',{icon:2});
		 return;
	}
	var ids = [];
	for(var i=0;i<rows.length;i++){
       ids.push(rows[i]['goodsId']); 
	}

    var loading = WST.msg('正在提交数据，请稍后...', {icon: 16,time:60000});
   	$.post(WST.U('admin/goods/batchAllow'),{ids:ids.join(',')},function(data,textStatus){
   			  layer.close(loading);
   			  var json = WST.toAdminJson(data);
   			  if(json.status=='1'){
   			    	WST.msg(json.msg,{icon:1});
   		            loadGrid();
   			  }else{
   			    	WST.msg(json.msg,{icon:2});
   			  }
   		});
}
// 批量审核不通过
function toBatchIllegal(){
	var rows = mmg.selectedRows();
	if(rows.length==0){
		 WST.msg('请选择商品',{icon:2});
		 return;
	}
	var ids = [];
	for(var i=0;i<rows.length;i++){
       ids.push(rows[i]['goodsId']); 
	}
	// 先显示弹出框,让用户输入审核不通原因
	var w = WST.open({type: 1,title:"商品不通过原因",shade: [0.6, '#000'],border: [0],
	    content: '<textarea id="illegalRemarks" rows="7" style="width:100%" maxLength="200"></textarea>',
	    area: ['500px', '260px'],btn: ['确定', '关闭窗口'],
        yes: function(index, layero){
        	var illegalRemarks = $.trim($('#illegalRemarks').val());
        	if(illegalRemarks==''){
        		WST.msg('请输入不通过原因!', {icon: 5});
        		return;
        	}
        	var ll = WST.msg('数据处理中，请稍候...');
		    $.post(WST.U('admin/goods/batchIllegal'),{ids:ids.join(','),illegalRemarks:illegalRemarks},function(data){
		    	layer.close(w);
		    	layer.close(ll);
		    	var json = WST.toAdminJson(data);
				if(json.status>0){
					WST.msg(json.msg, {icon: 1});
					loadGrid();
				}else{
					WST.msg(json.msg, {icon: 2});
				}
		   });
        }
	});
}

function allow(id,type){
	var box = WST.confirm({content:"您确定审核通过该商品吗?",yes:function(){
        var loading = WST.msg('正在提交数据，请稍后...', {icon: 16,time:60000});
        $.post(WST.U('admin/goods/allow'),{id:id},function(data,textStatus){
        			layer.close(loading);
        			var json = WST.toAdminJson(data);
        			if(json.status=='1'){
        			    WST.msg(json.msg,{icon:1});
        			    layer.close(box);
        			    loadGrid();
        			}else{
        			    WST.msg(json.msg,{icon:2});
        			}
        		});
         }});
}

function initIllegalGrid(){
    var h = WST.pageHeight();
    var cols = [
            {title:'&nbsp;', name:'goodsName', width: 30, renderer: function(val,item,rowIndex){
            	return "<span class='weixin'><img class='img' style='height:60px;width:60px;' src='"+WST.conf.ROOT+"/"+item['goodsImg']+"'><img class='imged' style='height:200px;width:200px;' src='"+WST.conf.ROOT+"/"+item['goodsImg']+"'></span>";
            }},
            {title:'商品名称', name:'goodsName', width: 100,sortable:true,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsName']+"</p></span>";
            }},
            {title:'商品编号', name:'goodsSn' ,width:60,sortable:true},
            {title:'所属店铺', name:'shopName' ,width:60,sortable:true},
            {title:'所属分类', name:'goodsCatName' ,width:60,renderer: function(val,item,rowIndex){
                return "<span  ><p class='wst-nowrap'>"+item['goodsName']+"</p></span>";
            }},
            {title:'违规原因', name:'illegalRemarks' ,width:160},
            {title:'操作', name:'' ,width:150, align:'center', renderer: function(val,item,rowIndex){
                var h = "";
	            h += "<a class='btn btn-blue' target='_blank' href='"+WST.U("home/goods/detail","goodsId="+item['goodsId']+"&key="+item['verfiycode'])+"'><i class='fa fa-search'></i>查看</a> ";
                /*if(WST.GRANT.WGSP_01)h += "<a class='btn btn-blue' href='javascript:edit(" + item['goodsId'] + ",0)'><i class='fa fa-pencil'></i>编辑</a> ";*/
	            if(WST.GRANT.WGSP_04)h += "<a class='btn btn-blue' href='javascript:allow(" + item['goodsId'] + ",0)'><i class='fa fa-check'></i>审核通过</a> ";
	            if(WST.GRANT.WGSP_03)h += "<a class='btn btn-red' href='javascript:del(" + item['goodsId'] + ",0)'><i class='fa fa-trash-o'></i>删除</a></div> "; 
	            return h;
            }}
            ];
 
    mmg = $('.mmg').mmGrid({height: (h-85),indexCol: true, indexColWidth:50, cols: cols,method:'POST',
        url: WST.U('admin/goods/illegalByPage'), fullWidthRows: true, autoLoad: true,remoteSort: true,sortName:'goodsSn',sortStatus:'desc',
        plugins: [
            $('#pg').mmPaginator({})
        ]
    }); 
}
function toolTip(){
    WST.toolTip();
}

// 双击设置 
function changSaleStatus(isWhat, obj, id){
    var params = {};
    status = $(obj).attr('status');
    params.status = status;
    params.id = id;
    switch(isWhat){
       case 'p':params.is = "goodsPoint";break;
       case 'r':params.is = "goodsReward";break;
    }
    var load = WST.load({msg:'请稍后...'});
    $.post(WST.U('admin/goods/changSaleStatus'),params,function(data,textStatus){
        layer.close(load);
        var json = WST.toJson(data);
        if(json.status==1){
            if(status==0){
                $(obj).attr('status',1);
                $(obj).removeClass('wrong').addClass('right');
            }else{
                $(obj).attr('status',0);
                $(obj).removeClass('right').addClass('wrong');
            }
        }else{
            WST.msg('操作失败',{icon:5});
        }
    });
}
