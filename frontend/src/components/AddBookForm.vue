<template>
  <div class="container">
    <div class="row justify-content-center pt-5 pb-5">
      <div class="col-md-8">
        <h3 class="text-start mb-3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-book-half"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M8.5 2.687v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
            />
          </svg>
          Add new book
        </h3>
        <hr />

        <form
          v-on:submit.prevent="submit"
          method="post"
          enctype="multipart/form-data"
        >
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-end"
              >Title <small class="text-danger">*</small></label
            >
            <div class="col-sm-9 text-start">
              <input
                type="text"
                class="form-control"
                placeholder="Title of the book"
                aria-label="title"
                v-model.trim="$v.title.$model"
                :class="{
                  'is-invalid':
                    validationStatus($v.title) || validationErrors.title,
                }"
              />
              <div v-if="!$v.title.required" class="invalid-feedback">
                Title field is required.
              </div>

              <div v-if="!$v.title.maxLength" class="invalid-feedback">
                Title field should not more than 150 characters.
              </div>

              <div
                v-if="validationErrors && validationErrors.title"
                class="invalid-feedback"
              >
                {{ validationErrors.title[0] }}
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-end"
              >Author(s) <small class="text-danger">*</small></label
            >
            <div class="col-sm-9 text-start">
              <input
                type="text"
                class="form-control"
                placeholder="Author(s) of the book"
                aria-label="authors"
                v-model.trim="$v.authors.$model"
                :class="{ 'is-invalid': validationStatus($v.authors) || validationErrors.authors }"
              />
              <div v-if="!$v.authors.required" class="invalid-feedback">
                Author(s) field is required.
              </div>

              <div v-if="!$v.authors.maxLength" class="invalid-feedback">
                Author(s) field should not more than 250 characters.
              </div>

              <div
                v-if="validationErrors && validationErrors.authors"
                class="invalid-feedback"
              >
                {{ validationErrors.authors[0] }}
              </div>
            </div>
          </div>

          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0 text-end">
              Format <small class="text-danger">*</small>
            </legend>
            <div class="col-sm-9">
              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="format"
                  id="format1"
                  value="Paperback"
                  checked
                  v-model.trim="$v.format.$model"
                  :class="{ 'is-invalid': validationStatus($v.format) || validationErrors.format }"
                />
                <label class="form-check-label" for="format1">
                  Paperback
                </label>
              </div>

              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="format"
                  id="format2"
                  value="Hardcover"
                  checked
                  v-model.trim="$v.format.$model"
                  :class="{ 'is-invalid': validationStatus($v.format) || validationErrors.format }"
                />
                <label class="form-check-label" for="format2">
                  Hardcover
                </label>
              </div>

              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="format"
                  id="format3"
                  value="Soft Copy"
                  checked
                  v-model.trim="$v.format.$model"
                  :class="{ 'is-invalid': validationStatus($v.format) || validationErrors.format }"
                />
                <label class="form-check-label" for="format3">
                  Soft Copy
                </label>

                <div v-if="!$v.format.required" class="invalid-feedback">
                  Please select the book format.
                </div>

                <div
                v-if="validationErrors && validationErrors.format"
                class="invalid-feedback"
              >
                {{ validationErrors.format[0] }}
              </div>
              </div>
            </div>
          </fieldset>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-end"
              >Original Price (&#163;)</label
            >
            <div class="col-sm-9 text-start">
              <input
                type="number"
                step=".01"
                class="form-control"
                placeholder="Original Price"
                v-model.trim="$v.originalPrice.$model"
                :class="{
                  'is-invalid':
                    validationStatus($v.originalPrice) ||
                    validationErrors.original_price,
                }"
              />
              <div v-if="!$v.originalPrice.decimal" class="invalid-feedback">
                Original price should be a number.
              </div>

              <div
                v-if="validationErrors && validationErrors.original_price"
                class="invalid-feedback"
              >
                {{ validationErrors.original_price[0] }}
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-end"
              >Selling Price (&#163;)
              <small class="text-danger">*</small></label
            >
            <div class="col-sm-9 text-start">
              <input
                type="number"
                step=".01"
                class="form-control"
                placeholder="Selling Price"
                v-model.trim="$v.sellingPrice.$model"
                :class="{
                  'is-invalid':
                    validationStatus($v.sellingPrice) ||
                    validationErrors.selling_price,
                }"
              />
              <div v-if="!$v.sellingPrice.required" class="invalid-feedback">
                Selling price is required.
              </div>
              <div v-if="!$v.sellingPrice.decimal" class="invalid-feedback">
                Selling price should be a number.
              </div>

              <div
                v-if="validationErrors && validationErrors.selling_price"
                class="invalid-feedback"
              >
                {{ validationErrors.selling_price[0] }}
              </div>
            </div>
          </div>

          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-3 pt-0 text-end">
              Condition <small class="text-danger">*</small>
            </legend>
            <div class="col-sm-9">
              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="condition"
                  id="condition1"
                  value="Almost New"
                  checked
                  v-model.trim="$v.condition.$model"
                  :class="{ 'is-invalid': validationStatus($v.condition) || validationErrors.condition }"
                />
                <label class="form-check-label" for="condition1">
                  Almost New
                </label>
              </div>

              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="condition"
                  id="condition2"
                  value="Good"
                  checked
                  v-model.trim="$v.condition.$model"
                  :class="{ 'is-invalid': validationStatus($v.condition) || validationErrors.condition }"
                />
                <label class="form-check-label" for="condition2">
                  Good
                </label>
              </div>

              <div class="form-check text-start">
                <input
                  class="form-check-input"
                  type="radio"
                  name="condition"
                  id="condition3"
                  value="Usable"
                  checked
                  v-model.trim="$v.condition.$model"
                  :class="{ 'is-invalid': validationStatus($v.condition) || validationErrors.condition }"
                />
                <label class="form-check-label" for="condition3">
                  Usable
                </label>

                <div v-if="!$v.format.required" class="invalid-feedback">
                  Please provide the book condition.
                </div>

                <div
                v-if="validationErrors && validationErrors.condition"
                class="invalid-feedback"
              >
                {{ validationErrors.condition[0] }}
              </div>
              </div>
            </div>
          </fieldset>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label text-end">Picture</label>
            <div class="col-sm-9 text-start">
                <input
                  class="form-control"
                  type="file"
                  id="file"
                  ref="file"
                  accept="image/*"
                  @change="handlePictureUpload"
                  :class="{'is-invalid': validationErrors.picture}"
                />
              <small class="text-muted">Maximum file size can be 2 megabytes</small>
              <small id="file-input-feedback" class="text-danger"></small>

              <div
                v-if="validationErrors && validationErrors.picture"
                class="invalid-feedback"
              >
                {{ validationErrors.picture[0] }}
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-9 offset-sm-3 text-start">
              <button type="submit" class="btn btn-outline-success px-5" id="submit-button">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { required, maxLength, decimal } from "vuelidate/lib/validators";
import axios from "axios";

export default {
  name: "BookForm",
  data: function() {
    return {
      title: "",
      authors: "",
      format: "",
      condition: "",
      originalPrice: "",
      sellingPrice: "",
      picture: "",
      validationErrors: [],
    };
  },
  validations: {
    title: { required, maxLength: maxLength(150) },
    authors: { required, maxLength: maxLength(250) },
    format: { required },
    originalPrice: { decimal },
    sellingPrice: { required, decimal },
    condition: { required },
  },

  methods: {
    validationStatus: function(validation) {
      return typeof validation != "undefined" ? validation.$error : false;
    },

    /* this function handles adding the file in the form */
    handlePictureUpload(e) {
      if (e.target.files[0].size > 2100000) {
        document.getElementById("file-input-feedback").textContent =
          " File size exceeded.";
        e.target.value = null;
      } else {
        this.picture = e.target.files[0];
        document.getElementById("file-input-feedback").textContent = "";
      }
    },

    submit: function() {
      this.$v.$touch();
      if (this.$v.$pendding || this.$v.$error) return;

document.getElementById("submit-button").classList.add('disabled');
      document.getElementById("submit-button").textContent = 'Saving ...';

      const formData = new FormData();

      formData.append("title", this.title);
      formData.append("authors", this.authors);
      formData.append("format", this.format);
      formData.append("original_price", this.originalPrice);
      formData.append("selling_price", this.sellingPrice);
      formData.append("condition", this.condition);
      formData.append("picture", this.picture);

      axios
        .post("/api/books", formData)
        .then((response) => {

          if (response.data.status == "success") {
            this.$toast.success(response.data.message, {
              duration: 10000,
            });

            // redirecting to the book details page
          this.$router.push("/books/" + response.data.data.id);
          }

          if (response.data.status == "error") {
            this.$toast.error(response.data.message, {
              duration: 10000,
            });

            document.getElementById("submit-button").classList.remove('disabled');
      document.getElementById("submit-button").textContent = 'Save';
          }
        })
        .catch((error) => {
          if (error.response.status == 422) {
            // catching validation errors from server side
            this.validationErrors = error.response.data;

            document.getElementById("submit-button").classList.remove('disabled');
      document.getElementById("submit-button").textContent = 'Save';
          }
        });
    },
  },
};
</script>
