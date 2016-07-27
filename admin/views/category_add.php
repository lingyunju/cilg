<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加分类</title>
    <link href="/admin/views/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="/admin/main/admin">首页</a></li>
        <li><a href="">添加分类</a></li>
    </ul>
</div>

<div class="formbody">

    <div class="formtitle"><span>添加分类</span></div>

    <ul class="forminfo">
        <form action="" method="post">
            <li><?php echo validation_errors(); ?></li>
            <li><label>上级分类</label>
                <select name="parent_id" class="dfselect">
                    <option value="">--顶级分类--</option>
                    <option value="">--顶级分类--</option>
                    <option value="">--顶级分类--</option>
                    <option value="">--顶级分类--</option>
                </select>
            </li>
            <li><label>分类名称</label><input name="cat_name" type="text" class="dfinput" /><i>分类名称不能超过30个字符</i></li>
            <li><label>分类图片</label><input name="cat_img" type="text" class="dfinput" /></li>
            <li><label>图片链接</label><input name="cat_img_link" type="text" class="dfinput" /></li>
            <li><label>是否显示</label><cite><input name="is_show" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="is_show" type="radio" value="0" />否</cite></li>
            <li><label>是否推荐</label><cite><input name="show_in_nav" type="radio" value="1" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="show_in_nav" type="radio" value="0" />否</cite></li>
            <li><label>分类排序</label><input name="sort_order" type="text" class="dfinput" /></li>
            <li><label>关键字</label><input name="keywords" type="text" class="dfinput" /></li>
            <li><label>分类描述</label><textarea name="cat_desc" cols="" rows="" class="textinput"></textarea></li>
            <li><label>&nbsp;</label><input name="cate_add" type="submit" class="btn" value="确认保存"/> <input name="" type="button" class="btn" value="取消返回"/></li>
        </form>
    </ul>

</div>


</body>

</html>
