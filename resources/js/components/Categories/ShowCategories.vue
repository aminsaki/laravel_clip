<template>
  <div class="row card">
    <table class="table table-bordered">
         <thead >
               <tr>
                   <th> ردیف </th>
                   <th>عنوان</th>
                   <th>توضیحات</th>
                   <th>عکس</th>
                   <th colspan="2">عملیات</th>
               </tr>
         </thead>
        <tbody class="table-sales" >
        <tr v-for="(categorie , index) in categories">
                 <td>{{categorie.id}}</td>
                 <td>{{categorie.title}}</td>
                 <td>{{categorie.description}}</td>
                 <td><img   :src="categorie.cover" class="img-holder" height="50" width="80"> </td>
                <td><a href="#" class="btn btn-danger" v-on:click="deleteUser(categorie.id, index)">حذف</a>
                <router-link :to="{name: 'EditCategories', params: {id: categorie.id }}" class="btn btn-xs btn-success">
                    Edit
                </router-link>

            </td>
             </tr>
        <tr>
            <td colspan="5"   >

                <button class="btn btn-info" v-on:click="foreachPaginateUsers(paginatetion.prev_page_url)"   :disabled="!paginatetion.prev_page_url"> قبلی
                </button>
                <span>Page {{paginatetion.current_page}} of {{paginatetion.last_page}}</span>

                <button class="btn btn-info" v-on:click="foreachPaginateUsers(paginatetion.next_page_url)"
                        :disabled="!paginatetion.next_page_url">بعدی
                </button>

            </td>
        </tr>
        </tbody>
    </table>
  </div>

</template>

<script>
    export default {
        name: "EditComponent",
        data() {
            return {
                categories:{},
                 id:'',
                description:'',
                cover:'',
                allerros:[],

             url:'categories',
              paginatetion: {},
            }

        },
        mounted() {
            this.getUser();
        },
        methods:{

             getUser(){
                 let $this = this;
                 axios.get(this.url).then(response => {

                    this.categories = response.data.data;
                     $this.makePaginatetion(response.data);
                });
            },///getUser



          deleteUser(id, index) {
            axios.delete("categories" + "/" + id)
                .then(response => {

                  this.categories.splice(index, 1);
                    this.allerros = response.data;
                    this.$swal(
                        '',
                        this.allerros,
                        'success'
                    )

                },(errors) => {
                    console.log(errors);
                })
        },///deleteUser

            makePaginatetion(data) {

                let paginatetion = {
                    current_page: data.current_page,
                    last_page_url: data.last_page_url,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
                this.paginatetion = paginatetion;
            },
            foreachPaginateUsers(url) {
                  console.log(url);
                this.url = url,
               this.getUser()
            }
     },//methods

    }
</script>

<style scoped>
   table thead tr th{
       text-align: center;
       color:white;
   }
   table thead{
       background-color: #2a3f6c;
   }
   table tbody tr td{
       text-align: center;
   }
</style>