<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="createLesson"
    tabindex="-1"
    role="dialog"
    aria-labelledby="createLessonLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createLessonLabel">Create New Lesson</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Lesson Title" v-model="title" />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Video Id" v-model="video_id" />
          </div>
          <div class="form-group">
            <input
              type="number"
              class="form-control"
              placeholder="Episode Number"
              v-model="episode_number"
            />
          </div>
          <div class="form-group">
            <textarea class="form-control" cols="30" rows="10" v-model="description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="createLesson">Save Lesson</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Axios from "axios";

export default {
  mounted() {
    this.$parent.$on("create_new_lesson", (seriesId) => {
      this.seriesId = seriesId;
      console.log("Hello We Are Creating a Lesson");
      $("#createLesson").modal();
    });
  },

  data() {
    return {
      title: "",
      description: "",
      episode_number: "",
      video_id: "",
      seriesId: "",
    };
  },

  methods: {
    createLesson() {
      Axios.post(`/admin/${this.seriesId}/lessons`, {
        title: this.title,
        description: this.description,
        episode_number: this.episode_number,
        video_id: this.video_id,
      })
        .then((resp) => {
          this.$parent.$emit("lesson_created", resp.data);
          $("#createLesson").modal("hide");
        })
        .catch((resp) => {
          console.log(resp);
        });
    },
  },
};
</script>
