<template>
  <div className="Popup" >
  <div className="popup-content" @click.stop="">
    <slot></slot>
  </div>
  </div>
</template>
<style>
  .Popup {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.384);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .popup-content {
    background: rgba(45, 56, 74, 0.70);
    box-shadow: 0px 1px 4px 0px rgba(255, 255, 255, 0.44);
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 800px;
    min-height: 500px;
    padding: 10px;
    border-radius: 10px;
  }

  .popup-content > .title {
    text-align: center;
    font-size: 26px;
    font-weight: 500;

  }
</style>

<script>
export default {
    name: 'Popup',
    props: {
    },
      data() {
        return {
        }
    },
    methods: {

    },
}
</script>
<style scoped>

</style>