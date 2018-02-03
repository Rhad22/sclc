<template>
   
        <li  :class="className">
                <div class="media-body">
                    <div class="media-content" ><slot></slot></div>
                    <span class="media-annotation display-block mt-10" id="time">{{ time }} 
                    <a href="#"><small class="badge float-right" :class='badgeClass'>{{ user }}</small></a></span>
                                    </div>

                                    <div class="media-right">
                                        <a href="assets/images/demo/images/3.png">
                                            <img src="assets/images/demo/users/face1.jpg" class="img-circle" alt="">
                                        </a>
                                    </div>
                                </li>
        
    
</template>

<script>
    export default {
        props:[
            'color',
            'user',
            'time'
        ],
        computed:{
            className(){
                return 'media '+this.color;
            },
            badgeClass(){
                return 'badge bg-teal-400';
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style>
    #time{
        font-size: 9px;
        margin-top: 10px;
        color: black;
    }
</style>
