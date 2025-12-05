<template>
  <div class="container-fluid vh-100 d-flex flex-column">

    <!-- Nội dung chính -->
    <div class="row flex-grow-1">
      <!-- To‑Do List -->
      <div v-if="showTodo" class="col-12 col-md-4 h-100 d-flex flex-column">
        <div class="card flex-grow-1">
          <div class="card-header d-flex justify-content-between align-items-center">
            <strong>To‑Do List</strong>
            <button class="btn btn-sm btn-outline-secondary" @click="showTodo = false">Ẩn</button>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="input-group mb-2">
              <input v-model="newTask" type="text" class="form-control" placeholder="Nhập việc cần làm">
              <button class="btn btn-success" @click="addTask">Thêm</button>
            </div>

            <draggable v-model="todoTasks" group="tasks" item-key="id" class="list-group flex-grow-1">
              <template #item="{ element }">
                <div class="list-group-item d-flex justify-content-between align-items-center">
                  <span>{{ element.text }}</span>
                  <div class="dropdown">
                    <button class="btn btn-sm btn-outline-dark" type="button" @click="toggleDropdown(element.id)">
                      <span style="font-size: 1.5em;">&#8942;</span>
                    </button>
                    <div v-if="dropdownOpen === element.id" class="dropdown-menu show" style="position: absolute;">
                      <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                      <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                      <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                    </div>
                  </div>
                </div>
              </template>
            </draggable>
          </div>
        </div>
      </div>

      <!-- Board -->
      <div v-if="showBoard" class="col h-100 d-flex flex-column">
        <div class="card flex-grow-1">
          <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Board phân chia công việc</strong>
            <button class="btn btn-sm btn-outline-secondary" @click="showBoard = false">Ẩn</button>
          </div>
          <div class="card-body">
            <div class="row h-100 g-2">
              <!-- Chưa làm -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="border border-dark rounded p-2 h-100 d-flex flex-column">
                  <h6 class="mb-2 text-center">Chưa làm</h6>
                  <div class="input-group mb-2">
                    <input v-model="newBacklog" type="text" class="form-control" placeholder="Thêm thẻ mới">
                    <button class="btn btn-outline-primary" @click="addBacklog">Thêm</button>
                  </div>
                  <draggable v-model="backlog" group="tasks" item-key="id" class="list-group flex-grow-1">
                    <template #item="{ element }">
                      <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-outline-dark" type="button" @click="toggleDropdown(element.id)">
                            <span style="font-size: 1.5em;">&#8942;</span>
                          </button>
                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show" style="position: absolute;">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>

              <!-- Đang làm -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="border border-dark rounded p-2 h-100 d-flex flex-column">
                  <h6 class="mb-2 text-center">Đang làm</h6>
                  <div class="input-group mb-2">
                    <input v-model="newDoing" type="text" class="form-control" placeholder="Thêm thẻ mới">
                    <button class="btn btn-outline-primary" @click="addDoing">Thêm</button>
                  </div>
                  <draggable v-model="doing" group="tasks" item-key="id" class="list-group flex-grow-1">
                    <template #item="{ element }">
                      <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-outline-dark" type="button" @click="toggleDropdown(element.id)">
                            <span style="font-size: 1.5em;">&#8942;</span>
                          </button>
                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show" style="position: absolute;">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>

              <!-- Hoàn thành -->
              <div class="col-12 col-md-4 d-flex flex-column">
                <div class="border border-dark rounded p-2 h-100 d-flex flex-column">
                  <h6 class="mb-2 text-center">Hoàn thành</h6>
                  <div class="input-group mb-2">
                    <input v-model="newDone" type="text" class="form-control" placeholder="Thêm thẻ mới">
                    <button class="btn btn-outline-primary" @click="addDone">Thêm</button>
                  </div>
                  <draggable v-model="done" group="tasks" item-key="id" class="list-group flex-grow-1">
                    <template #item="{ element }">
                      <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ element.text }}</span>
                        <div class="dropdown">
                          <button class="btn btn-sm btn-outline-dark" type="button" @click="toggleDropdown(element.id)">
                            <span style="font-size: 1.5em;">&#8942;</span>
                          </button>
                          <div v-if="dropdownOpen === element.id" class="dropdown-menu show" style="position: absolute;">
                            <button class="dropdown-item" @click="assignTask(element)">Giao</button>
                            <button class="dropdown-item" @click="setTime(element)">Thời gian</button>
                            <button class="dropdown-item text-danger" @click="deleteTask(element)">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </template>
                  </draggable>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Nút điều khiển -->
    <div class="d-flex justify-content-center mt-2">
      <button class="btn btn-warning text-dark rounded px-4 py-2 me-2" @click="showTodo = !showTodo">
        To‑Do List
      </button>
      <button class="btn btn-primary text-white rounded px-4 py-2" @click="showBoard = !showBoard">
        Board
      </button>
    </div>
  </div>
</template>


<script>
import draggable from 'vuedraggable';
export default {
  components: {
    draggable,
  },
  data() {
    return {
      showTodo: true,
      showBoard: true,
      newTask: '',
      newBacklog: '',
      newDoing: '',
      newDone: '',
      dropdownOpen: null,
      todoTasks: [
        { id: 1, text: 'Viết tài liệu dự án' },
        { id: 2, text: 'Kiểm tra lỗi giao diện' },
        { id: 3, text: 'Chuẩn bị báo cáo tuần' },
      ],
      backlog: [
        { id: 4, text: 'Thiết kế database' },
        { id: 5, text: 'Tạo wireframe' },
      ],
      doing: [
        { id: 6, text: 'Phát triển API' },
      ],
      done: [
        { id: 7, text: 'Cài đặt môi trường' },
      ],
    };
  },
  methods: {
    addTask() {
      if (this.newTask.trim()) {
        this.todoTasks.push({ id: Date.now(), text: this.newTask });
        this.newTask = '';
      }
    },
    addBacklog() {
      if (this.newBacklog.trim()) {
        this.backlog.push({ id: Date.now(), text: this.newBacklog });
        this.newBacklog = '';
      }
    },
    addDoing() {
      if (this.newDoing.trim()) {
        this.doing.push({ id: Date.now(), text: this.newDoing });
        this.newDoing = '';
      }
    },
    addDone() {
      if (this.newDone.trim()) {
        this.done.push({ id: Date.now(), text: this.newDone });
        this.newDone = '';
      }
    },
    assignTask(item) {
      alert(`Assign task: ${item.text}`);
      this.dropdownOpen = null;
    },
    setTime(item) {
      alert(`Set time for: ${item.text}`);
      this.dropdownOpen = null;
    },
    deleteTask(item) {
      this.todoTasks = this.todoTasks.filter(t => t.id !== item.id);
      this.backlog = this.backlog.filter(t => t.id !== item.id);
      this.doing = this.doing.filter(t => t.id !== item.id);
      this.done = this.done.filter(t => t.id !== item.id);
      this.dropdownOpen = null;
    },
    toggleDropdown(id) {
      this.dropdownOpen = this.dropdownOpen === id ? null : id;
    },
  },
};
</script>

<style scoped>
.dropdown-menu {
  z-index: 1050;
}
</style>

