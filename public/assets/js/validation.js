const validationOptions = [
  {
    attribute: "minlength",
    isValid: (input) =>
      input.value && input.value.length >= parseInt(input.minLength, 10),
    errMessage: (input, label) =>
      `${label.textContent} needs to be at least ${input.minLength} characters`,
  },
  {
    attribute: "costommaxlength",
    isValid: (input) =>
      input.value &&
      input.value.length <= parseInt(input.getAttribute("costommaxlength"), 10),
    errMessage: (input, label) =>
      `${label.textContent} needs to be less than ${input.getAttribute(
        "costommaxlength"
      )} characters`,
  },
  {
    attribute: "pattern",
    isValid: (input) => {
      const patternRegex = new RegExp(input.pattern);
      return patternRegex.test(input.value);
    },
    errMessage: (input, label) => `Not a valid ${label.textContent}`,
  },
  {
    attribute: "match",
    isValid: (input) => {
      const matchSelector = input.getAttribute("match");
      const matchedElement = formElement.querySelector(`#${matchSelector}`);
      return (
        matchedElement && matchedElement.value.trim() === input.value.trim()
      );
    },
    errMessage: (input, label) => {
      const matchSelector = input.getAttribute("match");
      const matchedElement = formElement.querySelector(`#${matchSelector}`);
      const matchedLabel = matchedElement.parentElement.querySelector("label");
      return `${label.textContent} should match ${matchedLabel.textContent}`;
    },
  },
  {
    attribute: "required",
    isValid: (input) => input.value.trim() !== "",
    errMessage: (input, label) => `${label.textContent} is required`,
  },
];

const validateSingleFormGroup = (formGroup) => {
  const label = formGroup.querySelector("label");
  const input = formGroup.querySelector("input, textarea");
  const errorContainer = formGroup.querySelector(".error");

  let formGroupErr = false;
  for (const option of validationOptions) {
    if (input.hasAttribute(option.attribute) && !option.isValid(input)) {
      errorContainer.textContent = option.errMessage(input, label);
      errorContainer.classList.remove("hidden");
      formGroupErr = true;
    }
  }
  if (!formGroupErr) {
    errorContainer.textContent = "";
  }
  return formGroupErr;
};

const validateFormGroups = (formToValidate) => {
  const formGroups = formToValidate.querySelectorAll(".formGroup");

  let formHasErrors = false;
  formGroups.forEach((formGroup) => {
    if (validateSingleFormGroup(formGroup)) {
      formHasErrors = true;
    }
  });

  return formHasErrors;
};

const formElement = document.querySelector("#form");

formElement.addEventListener("submit", (e) => {
  if (validateFormGroups(formElement)) {
    if (validateFormGroups(formElement)) {
      e.preventDefault(); // Prevent form submission if there are errors
      console.log("errors");

    } else {
      console.log("good");
    }
  }
});

Array.from(formElement.elements).forEach((element) => {
  element.addEventListener("blur", (e) => {
    validateSingleFormGroup(e.target.parentElement);
  });
});