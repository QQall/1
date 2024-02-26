<template>
<span class="loader"></span>
</template>

<script>
export default {
    props: {
    }
}

</script>

<style>
.loader {
  width: 50%;
  height: 4.8px;
  position: relative;
  overflow: hidden;
  margin: 0 auto;
  display: flex;
  margin-top: 10px;
}
.loader::after {
  content: '';  
  width: 96px;
  height: 4.8px;
  background: rgb(255, 91, 62);
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  animation: hitZak 0.6s ease-in-out infinite alternate;
}

@keyframes hitZak {
  0% {
    left: 0;
    transform: translateX(-1%);
  }
  100% {
    left: 100%;
    transform: translateX(-99%);
  }
}
    
</style>