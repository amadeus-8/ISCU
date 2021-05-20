<template>
    <div>
        <div class="modal fade"
             id="confirmModal"
             tabindex="-1"
             role="dialog"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <span>Вы уверены что хотите удалить предмет из списка?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">Отменить</button>
                        <button type="button"
                                class="btn btn-danger"
                                @click="deleteCourse(courseId)">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex"

export default {
    name: "Modal",
    props: {
        courseId: Number
    },
    methods: {
        ...mapActions(['deleteCourse'])
    }
}
</script>

<style scoped>
    .modal {
        color: #303134;
        font-weight: normal;
    }
</style>
