<template>
    <div>
        <div class="flash-container">
            <div class="alert fade alert-simple text-left show"
                 :class="isError ? 'alert-danger' : 'alert-success'"
                 v-show="isVisible">
                <i class="start-icon far"
                   :class="isError ? 'fa-times-circle' : 'fa-check-circle'"></i>
                <strong v-if="success !== null && !isError">Успешно!</strong> {{ success }}
                <strong v-if="error !== null && isError">Ошибка!</strong> {{ error }}
            </div>
        </div>
<!--        <button @click="isVisible = !isVisible" class="btn btn-primary">qwerty</button>-->
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "FlashMessage",
    mounted() {
        // setTimeout(() => {
        //     this.$store.commit('SET_FLASH_ISVISIBLE', false)
        // }, 3000)
    },
    computed: {
        ...mapGetters(['GET_SUCCESS', 'GET_ERROR', 'GET_FLASH_ISVISIBLE', 'GET_ISERROR']),
        success() {
            return this.GET_SUCCESS
        },
        error() {
            return this.GET_ERROR
        },
        isVisible() {
            return this.GET_FLASH_ISVISIBLE
        },
        isError() {
            return this.GET_ISERROR
        }
    },
}
</script>

<style scoped>
.alert {
    animation: 0.5s ease-in slidein;
}

.flash-container {
    width: 100%;
    display: flex;
    position: fixed;
    bottom: 0;
    left: 0;
    padding-left: 20px;
}

.alert > .start-icon {
    margin-right: 0;
    min-width: 20px;
    text-align: center;
}

.alert > .start-icon {
    margin-right: 5px;
}

.alert-simple.alert-success {
    border: 1px solid rgba(36, 241, 6, 0.46);
    background-color: rgba(7, 149, 66, 0.12156862745098039);
    box-shadow: 0px 0px 2px #259c08;
    color: #0ad406;
    transition: 0.5s;
    cursor: pointer;
}

.alert-success:hover {
    background-color: rgba(7, 149, 66, 0.35);
    transition: 0.5s;
}

.alert-simple.alert-danger {
    border: 1px solid rgba(241, 6, 6, 0.81);
    background-color: rgba(220, 17, 1, 0.16);
    box-shadow: 0px 0px 2px #ff0303;
    color: #ff0303;
    transition: 0.5s;
    cursor: pointer;
}

.alert-danger:hover {
    background-color: rgba(220, 17, 1, 0.33);
    transition: 0.5s;
}

.danger {
    font-size: 18px;
    color: #ff0303;
    text-shadow: none;
}

.alert:before {
    content: '';
    position: absolute;
    width: 0;
    border-left: 1px solid;
    border-right: 2px solid;
    border-bottom-right-radius: 3px;
    border-top-right-radius: 3px;
    left: 0;
    top: 50%;
    transform: translate(0, -50%);
    height: 20px;
}

@keyframes slidein {
    from {
        margin-left: -400px;
    }

    to {
        margin-left: 0;
    }
}
</style>
