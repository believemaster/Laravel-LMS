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
            <input
              type="text"
              class="form-control"
              placeholder="Lesson Title"
              v-model="lesson.title"
            />
          </div>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Video Id"
              v-model="lesson.video_id"
            />
          </div>
          <div class="form-group">
            <input
              type="number"
              class="form-control"
              placeholder="Episode Number"
              v-model="lesson.episode_number"
            />
          </div>
          <div class="form-group">
            <textarea class="form-control" cols="30" rows="10" v-model="lesson.description"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button
            type="button"
            class="btn btn-primary"
            @click="updateLesson()"
            v-if="editing"
          >Save Lesson</button>
          <button type="button" class="btn btn-primary" @click="createLesson()" v-else>Create Lesson</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Axios from "axios";

class Lesson {
  constructor(lesson) {
    this.title = lesson.title || "";
    this.description = lesson.description || "";
    this.video_id = lesson.video_id || "";
    this.episode_number = lesson.episode_number || "";
  }
}

export default {
  mounted() {
    this.$parent.$on("create_new_lesson", (seriesId) => {
      this.seriesId = seriesId;
      this.editing = false;
      this.lesson = new Lesson({});
      //   console.log("Hello We Are Creating a Lesson");
      $("#createLesson").modal();
    });

    this.$parent.$on("edit_lesson", ({ lesson, seriesId }) => {
      this.editing = true;
      this.lesson = new Lesson(lesson);
      this.lessonId = lesson.id;
      this.seriesId = seriesId;

      $("#createLesson").modal();
    });
  },

  data() {
    return {
      lesson: {},
      seriesId: "",
      editing: false,
      lessonId: null,
    };
  },

  methods: {
    createLesson() {
      Axios.post(`/admin/${this.seriesId}/lessons`, this.lesson)
        .then((resp) => {
          this.$parent.$emit("lesson_created", resp.data);
          $("#createLesson").modal("hide");
        })
        .catch((error) => {
          window.handleErrors(error);
        });
    },

    updateLesson() {
      Axios.put(`/admin/${this.seriesId}/lessons/${this.lessonId}`, this.lesson)
        .then((resp) => {
          this.$parent.$emit("lesson_edited", resp.data);
          $("#createLesson").modal("hide");
        })
        .catch((error) => {
          window.handleErrors(error);
        });
    },
  },
};
</script>
