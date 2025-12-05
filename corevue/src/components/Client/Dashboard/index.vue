<template>
    <div class="container py-4">

        <!-- Welcome -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Welcome back, Viet Nguyen Quoc</h2>
                <p class="text-muted">Here's what's happening with your projects today</p>
            </div>

            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newProjectModal">
                <i class="bi bi-plus-lg"></i> New Project
            </button>
        </div>

        <!-- Stats -->
        <div class="row g-3 mb-4">

            <!-- Total Projects -->
            <div class="col-md-3">
                <div class="card p-3 shadow-sm border-0">
                    <span class="fw-semibold d-block">Total Projects</span>
                    <div class="d-flex justify-content-between">

                        <div>
                            <h4 class="fw-bold">0</h4>
                            <small class="text-muted">projects in Viet Nguyen Quoc</small>
                        </div>
                        <div class="icon bg-light rounded p-3">
                            <i class="bi bi-folder fs-3 text-primary fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Projects -->
            <div class="col-md-3">
                <div class="card p-3 shadow-sm border-0">
                    <span class="fw-semibold d-block">Completed Projects</span>
                    <div class="d-flex justify-content-between">

                        <div>
                            <h4 class="fw-bold">0</h4>
                            <small class="text-muted">of 0 total</small>
                        </div>
                        <div class="icon bg-light rounded p-3">
                            <i class="bi bi-check2-circle fs-3 text-success fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Tasks -->
            <div class="col-md-3">
                <div class="card p-3 shadow-sm border-0">
                    <span class="fw-semibold d-block">My Tasks</span>
                    <div class="d-flex justify-content-between">

                        <div>
                            <h4 class="fw-bold">0</h4>
                            <small class="text-muted">assigned to me</small>
                        </div>
                        <div class="icon bg-light rounded p-3">
                            <i class="bi bi-people fs-3 text-purple fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overdue -->
            <div class="col-md-3">
                <div class="card p-3 shadow-sm border-0">
                    <span class="fw-semibold d-block">Overdue</span>
                    <div class="d-flex justify-content-between">

                        <div>
                            <h4 class="fw-bold">0</h4>
                            <small class="text-muted">need attention</small>
                        </div>
                        <div class="icon bg-light rounded p-3">
                            <i class="bi bi-exclamation-triangle fs-3 text-warning fa-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main content -->
        <div class="row g-3">

            <!-- Left: Project Overview -->
            <div class="col-md-8">
                <div class="card p-3 shadow-sm border-0">

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-semibold m-0"><b>Project Overview</b></h5>
                        <a href="#" class="text-decoration-none fw-semibold">View all →</a>
                    </div>

                    <hr>

                    <div class="text-center py-5">
                        <div class="p-5 d-inline-flex bg-light rounded-circle">
                            <i class="fa-solid fa-folder-plus fa-4x"></i>
                        </div>
                        <p class="text-muted">No projects yet</p>
                        <button class="btn btn-primary">Create your First Project</button>
                    </div>

                </div>
            </div>

            <!-- Right: My Tasks -->
            <div class="col-md-4">
                <div class="card p-3 shadow-sm border-0 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person fs-4 mr-2"></i>
                            <h6 class="m-0 fw-semibold">My Tasks</h6>
                        </div>
                        <span class="badge bg-success">0</span>
                    </div>
                    <hr>
                    <p class="text-muted text-center">No my tasks</p>
                </div>

                <!-- Overdue small -->
                <div class="card p-3 shadow-sm border-0 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle fs-4 mr-2"></i>
                            <h6 class="m-0 fw-semibold">Overdue</h6>
                        </div>
                        <span class="badge bg-warning">0</span>
                    </div>
                    <hr>
                    <p class="text-muted text-center">No overdue</p>
                </div>

                <!-- In progress -->
                <div class="card p-3 shadow-sm border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-clock mr-2"></i>
                            <h6 class="m-0 fw-semibold">In progress</h6>
                        </div>
                        <span class="badge bg-danger">0</span>
                    </div>
                    <hr>
                    <p class="text-muted text-center">No in progress</p>
                </div>
            </div>

        </div>
    </div>
    <!-- New Project Modal -->
<div class="modal fade" id="newProjectModal" tabindex="-1" aria-labelledby="newProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="newProjectModalLabel">
                   <b>New Project</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form id="projectForm">

                    <!-- Project Name -->
                    <div class="form-group">
                        <label><strong>Project Name</strong></label>
                        <input type="text" class="form-control" placeholder="Nhập tên dự án, ví dụ: Hệ thống quản lý dự án Scrum">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label><strong>Description</strong></label>
                        <textarea class="form-control" rows="3" placeholder="Mô tả chi tiết về dự án..."></textarea>
                    </div>

                    <!-- Row: Date -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><strong>Start Date</strong></label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>End Date</strong></label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Row: Priority & Status -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><strong>Priority</strong></label>
                            <select class="form-control">
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label><strong>Status</strong></label>
                            <select class="form-control">
                                <option value="not-started">Not Started</option>
                                <option value="in-progress" selected>In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Project</button>
            </div>

        </div>
    </div>
</div>

</template>
<script>
export default {

}
</script>
<style>
.text-purple {
    color: #9966ff;
}

.icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
