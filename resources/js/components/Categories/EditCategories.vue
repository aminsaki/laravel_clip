<template>
    <div class="container">
        <div class="row">
            <div class="text-right">
                <router-link to="/ShowCategories" class="nav-link">
                    <i class="material-icons">date_range</i>
                    <p> مشاهد دسته </p>
                </router-link>
            </div>
        </div>
        <form  enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 card" >
                    <div class="row  bg-dark  btn" >

                        <h4> ویرایش دسته  </h4>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 text-right">عنوان </label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="col-md-12 "  v-model="title"  id="title">
                        </div>
                    </div>
                        <input type="text"  hidden v-model="id"  id="id">

                    <div class="form-group ">
                        <label class="control-label col-sm-2">عکس </label>
                        <div class="col-sm-8">
                            <input type="file" class="container"  v-on:change="onImageChange">
                        </div>
                        <div class="col-sm-3 pull-left">
                            <!--<img  :src="pic" class="pull-left" height="50" width="80">-->
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 text-right">وضیعت دسته  </label>
                        <div class="col-sm-10">
                            <select name="activation" class="col-md-12" v-model="activation"  id="activation">
                                <option value="true">فعال</option>
                                <option value="false">غیر فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 text-right">توضیحات </label>
                        <div class="col-sm-10">
                            <textarea name="description" row="5"  cols="50" class="col-md-12" v-model="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 text-right">اولویت دسته </label>
                        <div class="col-sm-10">
                            <select name=" priority" class="col-md-5 btn " v-model="priority" id="priority">
                                <option v-for="number in 1000" v-bind:value="number" >{{number}}</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-sm-10">
                            <input type="button"   class="btn-facebook  container"  v-on:click="btn_update()"   value="به روز  کردن " >
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        name: "EditCategories",
        data(){
            return {
              url:"categories",
                allerros:[]
            }

        },
        mounted() {
            let id = this.$route.params.id;
            axios.get(this.url +"/" + id)
                .then(responser => {
                    var categorie = responser.data;
                    this.id= categorie.id;
                    this.title = categorie.title;
                    this.name = categorie.name;
                    this.activation = categorie.activation;
                    this.description = categorie.description;
                    this.priority = categorie.priority;
                    // this.pic = categorie.cover

                }).catch(errors => {

            });
        },
        methods: {
            onImageChange(e){
                this.image = e.target.files[0];
               console.log( this.image);
            },
            btn_update(e){
                let config = { headers: { 'content-type': 'multipart/form-data' } }
                let formData = new FormData();
                formData.append('id' , document.getElementById("id").value);
                formData.append('cover' , this.image );
                formData.append('title' , document.getElementById("title").value );
                formData.append('activation' , document.getElementById("activation").value);
                formData.append('description' , document.getElementById("description").value );
                formData.append('priority' , document.getElementById("priority").value );
                axios.post('categories/update',formData, config).
                then(response => {

                    this.allerros = response.data;
                    this.$swal(
                        '',
                        this.allerros,
                        'success'
                    )
                }).catch(errors=>{
                    this.allerros = errors.response.data.errors;
                    if (this.allerros.cover) {
                        for (let errorss of this.allerros.cover) {
                            this.allerros = errorss;
                        }
                    }
                    if (this.allerros.activation) {
                        for (let errorss of this.allerros.activation) {
                            this.allerros = errorss;
                        }
                    }
                    if (this.allerros.description) {
                        for (let errorss of this.allerros.description) {
                            this.allerros = errorss;
                        }
                    }
                    if (this.allerros.categories) {
                        for (let errorss of this.allerros.categories) {
                            this.allerros = errorss;
                        }
                    }
                    if (this.allerros.title) {
                        for (let errorss of this.allerros.title) {
                            this.allerros = errorss;
                        }
                    }
                    if (this.allerros.activation) {
                        for (let errorss of this.allerros.activation) {
                            this.allerros = errorss;
                        }
                    }
                    // console.log( this.allerros);
                    // this.$swal('خطا', this.allerros, 'تایید');
                    this.$swal(
                        '',
                        this.allerros,
                        'error',
                    )
                })
            }
        }

    }
</script>

<style scoped>

    .form-group {
        text-align: right;
    }
    .form-group input[type=file]{
        opacity: 1;
        z-index: 0;
        position:unset;
    }


</style>