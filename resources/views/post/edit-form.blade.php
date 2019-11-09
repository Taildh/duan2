@extends('layout2.main')
<script type="text/javascript"  src="../../../ckeditor/ckeditor.js"></script>
<script type="text/javascript"  src="../../../ckfinder/ckfinder.js"></script>
@section('content')
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption font-red-sunglo">
			<span class="caption-subject bold uppercase">Sửa bài viết</span>
		</div>
		<div class="actions">
			<a class="btn btn-circle btn-icon-only blue" href="javascript:;">
			<i class="icon-cloud-upload"></i>
			</a>
			<a class="btn btn-circle btn-icon-only green" href="javascript:;">
			<i class="icon-wrench"></i>
			</a>
			<a class="btn btn-circle btn-icon-only red" href="javascript:;">
			<i class="icon-trash"></i>
			</a>
			<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
			</a>
		</div>
	</div>
	<div class="portlet-body form" style="height: auto;">
		<form action="{{route('post.edit', ['id' => $model->id])}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-body">
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon">
						<input type="text" name="title" value="{{old('title', $model->title)}}" class="form-control">
						<label for="form_control_1">Tên bài viết</label>
						<span class="help-block">Mời bạn nhập tên bài viết</span>
						<i class="fa fa-bell-o"></i>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon">
						<input type="file" name="image" value="{{old('image', $model->image)}}" class="form-control">
						
						<span class="help-block">Mời bạn nhập tên bài viết</span>
						<i class="fa fa-bell-o"></i>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<input type="text" name="short_desc" value="{{old('short_desc', $model->short_desc)}}" class="form-control">
						<label for="form_control_1">Nội dung tóm tắt bài viết</label>
						<span class="help-block">Mời bạn nhập nội dung tóm tắt bài viết</span>
						<i class="icon-user"></i>
					</div>
				</div>
				
				<div class="form-group form-md-line-input has-success form-md-floating-label">
					<div class="input-icon right">
						<textarea id="demo" class="form-control cheditor" rows="5" name="description">{{old('description', $model->description)}}</textarea>
						<span class="help-block">Mời bạn nhập nội dung bài viết</span>
						<script type="text/javascript">
							CKEDITOR.replace("demo");
						</script>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<input type="text" name="views" value="{{old('views', $model->views)}}" class="form-control">
						<label for="form_control_1">Lượt Xem</label>
						<span class="help-block">Mời bạn nhập lượt xem</span>
						<i class="icon-user"></i>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<label for="form_control_1">Danh mục</label>
						<select name="category_post_id" class="form-control">
							@foreach ($cates as $bv)
								<option value="{{$bv->id}}"
									@if($bv->id == $model->category_post_id)
									selected
									@endif
								>{{$bv->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<input type="text" name="date" value="{{old('date', $model->date)}}" class="form-control">
						<label for="form_control_1">Ngày xuất bản</label>
						<span class="help-block">Mời bạn nhập ngày xuất bản</span>
						<i class="icon-user"></i>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<input type="text" name="author" value="{{old('author', $model->author)}}" class="form-control">
						<label for="form_control_1">Tác giả bài viết</label>
						<span class="help-block">Mời bạn nhập tác giả bài viết</span>
						<i class="icon-user"></i>
					</div>
				</div>
				<div class="form-group form-md-line-input has-success form-md-floating ">
					<div class="input-icon right">
						<input type="text" name="status" value="{{old('status', $model->status)}}" class="form-control">
						<label for="form_control_1">Trạng thái bài viết</label>
						<span class="help-block">Mời bạn nhập trạng thái bài viết</span>
						<i class="icon-user"></i>
					</div>
				</div>
			</div>
			<div class="form-actions noborder">
				<button type="submit" class="btn blue">Gửi thông tin</button>
				<button type="button" class="btn green"><a href="{{route('homepost')}}" style="text-decoration: none; color: #fff;">Quay lại</a></button>
			</div>
		</form>
	</div>
</div>

@endsection